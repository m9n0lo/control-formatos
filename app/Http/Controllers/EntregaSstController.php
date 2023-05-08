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
