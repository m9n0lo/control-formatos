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
        $articulos = Articulos_ssts::all();

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
            ->route('articulos')
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
