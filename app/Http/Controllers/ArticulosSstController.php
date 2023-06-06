<?php

namespace App\Http\Controllers;
use App\Models\Articulos_ssts;
use DB;

use Illuminate\Http\Request;

class ArticulosSstController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //SELECT a.nombre, sum(di.cantidad_disponible) FROM articulos_ssts a JOIN detalle_inventario_ssts di
        //ON  a.id=di.articulos_id GROUP BY a.nombre;
        $articulos = DB::table('articulos_ssts')
                        ->leftjoin('detalle_inventario_ssts','articulos_ssts.id','=','detalle_inventario_ssts.articulos_id')
                        ->selectRaw('articulos_ssts.nombre, sum(detalle_inventario_ssts.cantidad_disponible) AS total , articulos_ssts.id ,articulos_ssts.descripcion,articulos_ssts.estado')
                        ->groupBy('articulos_ssts.nombre','articulos_ssts.id','articulos_ssts.descripcion','articulos_ssts.estado')
                        ->get();

        return view('menu.SST.articulos_sst', compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $entrega = Articulos_ssts::create([
            'nombre' => $request->nombre_a_sst,
            'descripcion' => $request->descripcion_a_sst,
            'estado' => 1,
        ]);

        return redirect()
            ->route('sst.articulos')
            ->with('mensaje', '¡Articulos agregado correctamente!');
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
    public function update(Request $request)
    {
        $id = $request->input('id');
        $estado = $request->input('estado');

        // Actualizar el estado del artículo en la base de datos
        $articulo = Articulos_ssts::find($id);
        $articulo->estado = $estado;
        $articulo->save();

        // Puedes devolver una respuesta JSON si es necesario
        return response()->json(['success' => true]);
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
