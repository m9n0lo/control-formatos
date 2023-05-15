<?php

namespace App\Http\Controllers;

use App\Models\Entrega_ssts;
use App\Models\Articulos_ssts;
use App\Models\Detalle_entrega_sst;
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

        return view('menu.SST.entrega_sst', compact('person'));
    }

    public function datatable()
    {
        $articulos = Articulos_ssts::select('id', 'descripcion')
            ->where('estado', '=', 1)
            ->get();

        return datatables()
            ->collection(
                Articulos_ssts::select('id', 'descripcion')
                    ->where('estado', '=', 1)
                    ->get(),
            )
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        DB::beginTransaction();

        try {
            // Crear registro de  entrega
            $user_id = auth()->id();

            $entrega = Entrega_ssts::create([
                'usuario' => $user_id,
                'persona_id'=>$request->persona_id_sst,
                'fecha_entrega'=>date('Y-m-d H:i:s', strtotime($request->fecha_entrega_sst)),
                'firma'=>$request->firma_recibido_sst,
                'firma_sgsst'=>$request->firma_SGSST_sst
            ]);

            // Crear registro de detalle de entrega para cada artículo

            $articulos_sst = $request->input('articulos_sst');
            $cantidad_articulos = $request->input('cantidad_articulos');
            $observaciones_sst = $request->input('observaciones_sst');


            $articulos = [];

            for ($i = 0; $i < count($articulos_sst); $i++) {
                $articulos[] = [

                    'articulos_id' => $articulos_sst[$i],
                    'cantidad_articulos' => $cantidad_articulos[$i],

                ];
            }

            foreach ($articulos as $articulo) {
                Detalle_entrega_sst::create([
                    'entregas_id' => $entrega->id,
                    'articulos_id' => $articulo['articulos_id'],
                    'cantidad_entregada' => $articulo['cantidad_articulos'],
                    'observaciones' => $request->observaciones_sst
                ]);
            }
            /* dd($request->all()); */

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

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
