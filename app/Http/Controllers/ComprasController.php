<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use DB;

class ComprasController extends Controller
{
    public function index()
    {
        $person = Persona::select('id', 'nombre_funcionario')->get();
        //SELECT * FROM personas WHERE cargo LIKE '%JEFE%' OR cargo LIKE '%DIRECTOR%';
        $jefe = Persona::where('cargo', 'LIKE', '%JEFE%')
            ->orwhere('cargo', 'LIKE', '%DIRECTOR%')
            ->get();

        return view('menu.compras.solicitud_rqs', compact('person', 'jefe'));
    }

   /*  public function solicitudRQS(Request $request)
    {
        $file1 = request()->file('firma');
        $cotizacion1 = $file1->getClientOriginalName();

        $file2 = request()->file('firma');
        $cotizacion2 = $file2->getClientOriginalName();

        $file3 = request()->file('firma');
        $cotizacion3 = $file3->getClientOriginalName();

        $user_id = auth()->id();

        Compras::insert([
        'area'=>$request->area,
        'users_id'=> $user_id ,
        'solicitado_por'=>$request->area,
        'fecha_elaboracion'=>date('Y-m-d H:i:s', strtotime($request->fecha_elaboracion)),,
        'jefe_inmediato'=>$request->area,
        'fecha_solicitud'=>date('Y-m-d H:i:s', strtotime($request->fecha_solicitud)),,
        'fecha_esperada'=>date('Y-m-d H:i:s', strtotime($request->fecha_esperada)),,
        'tipo_solicitud'=>$request->area,
        'sede'=>$request->area,
        'razon_social'=>$request->area,
        'correo_electronico'=>$request->area,
        'telefono_contacto'=>$request->area,
        'servicios'=>1,
        'cotizacion1'=> $cotizacion1,
        'cotizacion2'=> $cotizacion2,
        'cotizacion3'=> $cotizacion3,
        'detalle_solicitud'=>$request->area,
        'costo_estimado'=>$request->area,
        'estado_gestion'=>1,
        'estado'=>1,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),

        ])

       return redirect()
            ->route('compras.solicitud')
            ->with('mensaje', '¡Formato agregado correctamente!');
    } */
    public function dashboardRQS()
    {
        return view('menu.compras.dashboard');
    }

    public function detalleRQS()
    {
        return view('menu.compras.detalle_rqc');
    }
}
