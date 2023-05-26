<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class InformesSstController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('menu.SST.informes_sst');
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


    public function show_informe_1(Request $request)
    {
       // SELECT  a.nombre,SUM(de.cantidad_entregada) AS cantidad FROM entrega_ssts e join detalle_entrega_ssts de ON e.id=de.entregas_id JOIN
        //articulos_ssts a ON de.articulos_id=a.id WHERE e.fecha_entrega BETWEEN '2023-05-18' AND '2023-05-24' GROUP BY a.nombre ;
        $fecha_inicial = $request->input('fecha_inicial_i1');
        $fecha_final =  $request-> input('fecha_final_i1');

        $informe_t_a_e_sst = DB::table('entrega_ssts')
        ->join('detalle_entrega_ssts', 'entrega_ssts.id', '=', 'detalle_entrega_ssts.entregas_id')
        ->join('articulos_ssts', 'detalle_entrega_ssts.articulos_id', '=', 'articulos_ssts.id')
        ->selectRaw( 'articulos_ssts.nombre as nombre, sum(detalle_entrega_ssts.cantidad_entregada) AS cantidad')
        ->whereBetween('entrega_ssts.fecha_entrega', [$fecha_inicial, $fecha_final])
        ->groupBy('articulos_ssts.nombre')
        ->get();

        $valores = [];

        foreach($informe_t_a_e_sst as $itaesst){
            $valores[] = ['name'=> $itaesst->nombre,
             'y'=> $itaesst->cantidad];
        }

        return response()->json($valores);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
