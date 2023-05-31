<?php

namespace App\Http\Controllers;

use App\Models\Inventario_sst;
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
        return view('menu.SST.inventarios_sst');
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
