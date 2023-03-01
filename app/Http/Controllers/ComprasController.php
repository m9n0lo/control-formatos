<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Compras;
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

    public function solicitudRQS(Request $request)
    {

        $file1 = !empty(request()->file('cotizacion1'))?request()->file('cotizacion1'):"";
        $cotizacion1 = empty($file1)?$request->cotizacion1:$file1->getClientOriginalName();
        $file2 = !empty(request()->file('cotizacion2'))?request()->file('cotizacion2'):"";
        $cotizacion2 = empty($file2)?$request->cotizacion2:$file2->getClientOriginalName();
        $file3 = !empty(request()->file('cotizacion3'))?request()->file('cotizacion3'):"";
        $cotizacion3 = empty($file3)?$request->cotizacion3:$file3->getClientOriginalName();


        $descripcion_servicio = $request->input('descripcion_servicio');
        $centro_servicio = $request->input('centro_servicio');
        $area_servicio = $request->input('area_servicio');
        $cantidad_servicio = $request->input('cantidad_servicio');
        $um_servicio = $request->input('um_servicio');
        $observacion_servicio = $request->input('observacion_servicio');

        $datos = [];
        for ($i = 0; $i < count($descripcion_servicio); $i++) {
            $datos [] = [
                'descripcion_servicio' => $descripcion_servicio[$i],
                'centro_servicio' =>   $centro_servicio[$i],
                'area_servicio' => $area_servicio[$i],
                'cantidad_servicio' => $cantidad_servicio[$i],
                'um_servicio' => $um_servicio[$i],
                'observacion_servicio' => $observacion_servicio[$i]
            ];
        }
        $datosjson=json_encode($datos);
        print_r ($datosjson);
        $datosjson=json_decode($datosjson);
        var_dump ($datosjson);

        foreach ($datosjson as $key => $value) {
            var_dump ($value["centro_servicio"]);
        }


        $user_id = auth()->id();

        Compras::insert([
            'area' => $request->area,
            'users_id' => $user_id,
            'solicitado_por' => 1,
            'fecha_elaboracion' => date('Y-m-d H:i:s', strtotime($request->fecha_elaboracion)),
            'jefe_inmediato' => $request->persona_id,
            'fecha_solicitud' => date('Y-m-d H:i:s', strtotime($request->fecha_solicitud)),
            'fecha_esperada' => date('Y-m-d H:i:s', strtotime($request->fecha_esperada)),
            'tipo_solicitud' => $request->tipo_solicitud,
            'sede' => $request->sede,
            'razon_social' => $request->razon_social,
            'correo_electronico' => $request->correo_contacto,
            'telefono_contacto' => $request->telefono_contacto,
            'servicios' => json_encode($datos),
            'cotizacion1' => $cotizacion1,
            'cotizacion2' => $cotizacion2,
            'cotizacion3' => $cotizacion3,
            'detalle_solicitud' => $request->detalle_solicitud,
            'costo_estimado' => $request->costo_estimado,
            'estado_gestion' => 1,
            'estado' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        if ($request->hasFile('cotizacion1')) {
            $file1->move(public_path() . '/sitio/imagenes/cotizaciones/', $cotizacion1);
        }if ($request->hasFile('cotizacion2')) {
            $file2->move(public_path() . '/sitio/imagenes/cotizaciones/', $cotizacion2);
        }if ($request->hasFile('cotizacion3')) {
            $file3->move(public_path() . '/sitio/imagenes/cotizaciones/', $cotizacion3);
        }
        return "";
        /* return redirect()
            ->route('compras.solicitud')
            ->with('mensaje', '¡Formato agregado correctamente!'); */
    }
    public function dashboardRQS()
    {
        return view('menu.compras.dashboard');
    }

    public function detalleRQS()
    {
        return view('menu.compras.detalle_rqc');
    }
}
