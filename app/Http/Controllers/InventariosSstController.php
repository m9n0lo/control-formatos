<?php

namespace App\Http\Controllers;

use App\Models\Inventarios_ssts;
use App\Models\Articulos_ssts;
use DB;
use Illuminate\Http\Request;

class InventariosSstController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulos_ssts::select('id', 'nombre')
            ->where('estado', '=', 1)
            ->get();
        $array = ['toncacipa', 'BPACK S.A.S', 'Barranquilla'];
        return view('menu.SST.inventarios_sst', compact('array','articulos'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function GuardarInventarioSst(Request $request)
    {
        $data = $request->input('data');

        foreach ($data as $row) {
        $inventario = Inventarios_ssts::create([
            'articulos_id' => $row['Nombre articulo'],
            'cantidad_disponible' => $row['Cantidad'],
            'sede' => $row['Sede'],
            'observaciones' => $row['Observaciones'],
            'fecha_ingreso' => $row['Fecha ingreso'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
        return redirect()
            ->route('sst.inventarios')
            ->with('mensaje', '¡Formato agregado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventario_sst  $inventario_sst
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario_sst $inventario_sst)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventario_sst  $inventario_sst
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventario_sst $inventario_sst)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventario_sst  $inventario_sst
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventario_sst $inventario_sst)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventario_sst  $inventario_sst
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario_sst $inventario_sst)
    {
        //
    }
}
