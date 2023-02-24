<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComprasController extends Controller
{
    public function solicitudRQS()
    {
        return view('menu.compras.solicitud_rqs');
    }
    public function dashboardRQS()
    {
        return view('menu.compras.dashboard');
    }

    public function detalleRQS(){
        return view('menu.compras.detalle_rqc');
    }
}
