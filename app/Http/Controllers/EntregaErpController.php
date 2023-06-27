<?php

namespace App\Http\Controllers;

use App\Models\entrega_erp;
use App\Http\Requests\Storeentrega_erpRequest;
use App\Http\Requests\Updateentrega_erpRequest;

class EntregaErpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('menu.TIC.Entrega_ERP');
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
     * @param  \App\Http\Requests\Storeentrega_erpRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeentrega_erpRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\entrega_erp  $entrega_erp
     * @return \Illuminate\Http\Response
     */
    public function show(entrega_erp $entrega_erp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\entrega_erp  $entrega_erp
     * @return \Illuminate\Http\Response
     */
    public function edit(entrega_erp $entrega_erp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateentrega_erpRequest  $request
     * @param  \App\Models\entrega_erp  $entrega_erp
     * @return \Illuminate\Http\Response
     */
    public function update(Updateentrega_erpRequest $request, entrega_erp $entrega_erp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\entrega_erp  $entrega_erp
     * @return \Illuminate\Http\Response
     */
    public function destroy(entrega_erp $entrega_erp)
    {
        //
    }
}
