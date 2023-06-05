<?php

namespace App\Http\Controllers;

use App\Models\Inventarios_ssts;
use App\Models\Detalle_inventario_sst;
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
        return view('menu.SST.inventarios_sst', compact('array', 'articulos'));
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
    DB::beginTransaction();

    try {
        $user_id = auth()->id();

        $inventario = Inventarios_ssts::create([
            'usuario' => $user_id,
            'sede' => $request->sede_i_sst,
            'observaciones' => $request->observaciones_i_sst,
            'fecha_ingreso' => date('Y-m-d H:i:s', strtotime($request->fecha_ingreso_i_sst)),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $articulos_i_sst = $request->input('articulos_i_sst');
        $cantidad_articulos_d_i = $request->input('cantidad_articulos_d_i');

        $articulos_d = [];

        for ($i = 0; $i < count($articulos_i_sst); $i++) {
            $articulos_d[] = [
                'articulos_id' => $articulos_i_sst[$i],
                'cantidad_articulos' => $cantidad_articulos_d_i[$i],
            ];
        }

        foreach ($articulos_d as $articulo) {
            $detalle_inventario = Detalle_inventario_sst::create([
                'inventario_id' => $inventario->id,
                'articulos_id' => $articulo['articulos_id'],
                'cantidad_disponible' => $articulo['cantidad_articulos'],
            ]);
        }

        $articulo = Articulos_ssts::find($articulo['articulos_id']);

        if ($articulo->estado === '3') {
            $articulo->estado = '1';
            $articulo->save();
        }

        DB::commit();
        return redirect()
            ->route('sst.inventarios')
            ->with('mensaje', '¡Articulos agregados correctamente!');
    } catch (\Exception $e) {
        DB::rollback();
        throw $e;
    }
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

    public function dashboard()
    {
        /* SELECT p.nombre_funcionario, e.fecha_entrega,a.nombre,de.cantidad_entregada,  e.firma ,
        e.firma_sgsst FROM personas p join entrega_ssts e ON p.id=e.persona_id join detalle_entrega_ssts de
         ON e.id=de.entregas_id JOIN articulos_ssts a ON de.articulos_id=a.id WHERE e.persona_id = 7;  */

        $inventarios_sst = DB::table('articulos_ssts')
            ->join('inventarios_ssts', 'articulos_ssts.id', '=', 'inventarios_ssts.articulos_id')
            ->join('users', 'inventarios_ssts.usuario', '=', 'users.id')
            ->select('articulos_ssts.nombre', 'inventarios_ssts.cantidad_disponible', 'inventarios_ssts.sede')
            ->get();

        return view('menu.SST.dashboard_i_sst', compact('inventarios_sst'));
    }

    public function datatable_i()
    {
        $articulos = Articulos_ssts::all();

        return datatables()
            ->collection(Articulos_ssts::all())
            ->toJson();
    }
}
