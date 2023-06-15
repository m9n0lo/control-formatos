<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
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
        $person = Persona::select('id', 'nombre_funcionario', 'empresa')->get();
        $array= ['toncacipa','BPACK S.A.S', 'Barranquilla'];
        return view('menu.SST.informes_sst', compact('person','array'));
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
        $fecha_final = $request->input('fecha_final_i1');

        $informe_t_a_e_sst = DB::table('entrega_ssts')
            ->join('detalle_entrega_ssts', 'entrega_ssts.id', '=', 'detalle_entrega_ssts.entregas_id')
            ->join('articulos_ssts', 'detalle_entrega_ssts.articulos_id', '=', 'articulos_ssts.id')
            ->selectRaw('articulos_ssts.nombre as nombre, sum(detalle_entrega_ssts.cantidad_entregada) AS cantidad')
            ->whereBetween('entrega_ssts.fecha_entrega', [$fecha_inicial, $fecha_final])
            ->groupBy('articulos_ssts.nombre')
            ->get();

        $valores = [];

        foreach ($informe_t_a_e_sst as $itaesst) {
            $valores[] = ['name' => $itaesst->nombre, 'y' => $itaesst->cantidad];
        }

        return response()->json($valores);
    }
    public function show_informe_2(Request $request)
    {
        //Consulta cantidad de articulos total entregados a X persona en una rango de fecha estipulada
        // SELECT p.nombre_funcionario,a.nombre,SUM(de.cantidad_entregada) FROM personas p join entrega_ssts e ON p.id=e.persona_id
        //join detalle_entrega_ssts de ON e.id=de.entregas_id JOIN articulos_ssts a ON
        //de.articulos_id=a.id WHERE e.persona_id = 10 AND e.fecha_entrega BETWEEN '2023-05-18' AND '2023-05-23' GROUP BY a.nombre;
        $fecha_inicial2 = $request->input('fecha_inicial_i2');
        $fecha_final2 = $request->input('fecha_final_i2');
        $persona_id = $request->input('persona_id');

        $consulta = DB::table('personas')
        ->join('entrega_ssts', 'personas.id', '=', 'entrega_ssts.persona_id')
        ->join('detalle_entrega_ssts', 'entrega_ssts.id', '=', 'detalle_entrega_ssts.entregas_id')
        ->join('articulos_ssts', 'detalle_entrega_ssts.articulos_id', '=', 'articulos_ssts.id')
        ->selectRaw('personas.nombre_funcionario as nombre_funcioanrio, articulos_ssts.nombre as nombre,sum(detalle_entrega_ssts.cantidad_entregada) AS cantidad')
        ->groupBy('articulos_ssts.nombre', 'personas.nombre_funcionario');
        if ($persona_id) {
            $consulta->where('entrega_ssts.persona_id', '=', $persona_id);
        }

        if ($fecha_inicial2 && $fecha_final2) {
            $consulta->whereBetween('entrega_ssts.fecha_entrega', [$fecha_inicial2, $fecha_final2]);
        }

        $informe_c_a_p_sst = $consulta->get();
        $valores = [];

        foreach ($informe_c_a_p_sst as $capsst) {
            $valores[] = ['name' => $capsst->nombre, 'y' => $capsst->cantidad];
        }
        return response()->json($valores);
    }

    public function show_informe_3(Request $request){
        // Consulta cantidad de articulos total entregados a todas las personas de dicha sede
       /*  SELECT  a.nombre, SUM(de.cantidad_entregada) AS cantidad FROM personas p join entrega_ssts e ON p.id=e.persona_id join
        detalle_entrega_ssts de ON e.id=de.entregas_id JOIN articulos_ssts a ON de.articulos_id=a.id
        WHERE p.empresa LIKE '%BPACK S.A.S%' GROUP BY p.nombre_funcionario, a.nombre ; */

        $fecha_inicial3 = $request->input('fecha_inicial_i3');
        $fecha_final3 = $request->input('fecha_final_i3');
        $empresa = $request->input('empresa_id');

        $consulta = DB::table('personas')
        ->join('entrega_ssts', 'personas.id', '=', 'entrega_ssts.persona_id')
        ->join('detalle_entrega_ssts', 'entrega_ssts.id', '=', 'detalle_entrega_ssts.entregas_id')
        ->join('articulos_ssts', 'detalle_entrega_ssts.articulos_id', '=', 'articulos_ssts.id')
        ->selectRaw('articulos_ssts.nombre as nombre,sum(detalle_entrega_ssts.cantidad_entregada) AS cantidad')
        ->groupBy('articulos_ssts.nombre');

        if ($empresa) {
            $consulta->where('personas.empresa', 'LIKE', $empresa);
        }

        if ($fecha_inicial3 && $fecha_final3) {
            $consulta->whereBetween('entrega_ssts.fecha_entrega', [$fecha_inicial3, $fecha_final3]);
        }

        $informe_c_a_e_sst = $consulta->get();


        $valores = [];

        foreach ($informe_c_a_e_sst as $caesst) {
            $valores[] = ['name' => $caesst->nombre, 'y' => $caesst->cantidad];
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
