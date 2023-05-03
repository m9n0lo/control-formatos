<?php

namespace App\Http\Controllers;

use App\Models\Entrega_sst;
use App\Models\Articulos_ssts;
use App\Models\Persona;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEntrega_sstRequest;
use App\Http\Requests\UpdateEntrega_sstRequest;

class EntregaSstController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $person = Persona::select('id', 'nombre_funcionario')->get();
        $articulos = Articulos_ssts::all();

        return view('menu.SST.entrega_sst', compact('person', 'articulos'));
    }

    public function select2()
    {
        //SELECT cargo ,nombre_funcionario FROM usuarios GROUP BY cargo, nombre_funcionario ORDER BY cargo ASC ;
        // Ejecutar la consulta SQL y obtener los resultados en una instancia de Collection
        $resultados = DB::table('personas')
            ->select('cargo', 'nombre_funcionario')
            ->groupBy('cargo', 'nombre_funcionario')
            ->orderBy('cargo', 'asc')
            ->get();

        // Agrupar los resultados por cargo
        $grupos = $resultados->groupBy('cargo');

        // Construir las opciones del select2
        $options = [];
        foreach ($grupos as $cargo => $personas) {
            $opciones = [];
            foreach ($personas as $persona) {
                $opciones[] = [
                    'id' => $persona->nombre_funcionario,
                    'text' => $persona->nombre_funcionario,
                ];
            }
            $options[] = [
                'text' => $cargo,
                'children' => $opciones,
            ];
        }

        // Convertir las opciones a JSON
        $json = json_encode($options);

        return $json;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEntrega_sstRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEntrega_sstRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entrega_sst  $entrega_sst
     * @return \Illuminate\Http\Response
     */
    public function show(Entrega_sst $entrega_sst)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entrega_sst  $entrega_sst
     * @return \Illuminate\Http\Response
     */
    public function edit(Entrega_sst $entrega_sst)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEntrega_sstRequest  $request
     * @param  \App\Models\Entrega_sst  $entrega_sst
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEntrega_sstRequest $request, Entrega_sst $entrega_sst)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entrega_sst  $entrega_sst
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entrega_sst $entrega_sst)
    {
        //
    }
}
