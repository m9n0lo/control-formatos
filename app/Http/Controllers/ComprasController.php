<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use App\Models\Persona;
use App\Models\Compras;
use App\Models\User;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

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
        /* $file1 = !empty(request()->file('cotizacion1')->store('public/imagenes/cotizaciones')) ? request()->file('cotizacion1') : '';
        $cotizacion1 = empty($file1) ? $request->cotizacion1 : $file1->getClientOriginalName();
        $file2 = !empty(request()->file('cotizacion2')) ? request()->file('cotizacion2') : '';
        $cotizacion2 = empty($file2) ? $request->cotizacion2 : $file2->getClientOriginalName();
        $file3 = !empty(request()->file('cotizacion3')) ? request()->file('cotizacion3') : '';
        $cotizacion3 = empty($file3) ? $request->cotizacion3 : $file3->getClientOriginalName(); */

        if ($request->hasFile('cotizacion1')) {
            $archivo = $request->file('cotizacion1');
            $archivo -> move(public_path() . '/sitio/imagenes/cotizaciones/', $archivo->getClientOriginalName());
        }

        $descripcion_servicio = $request->input('descripcion_servicio');
        $centro_servicio = $request->input('centro_servicio');
        $area_servicio = $request->input('area_servicio');
        $cantidad_servicio = $request->input('cantidad_servicio');
        $um_servicio = $request->input('um_servicio');
        $observacion_servicio = $request->input('observacion_servicio');

        $datos = [];
        for ($i = 0; $i < count($descripcion_servicio); $i++) {
            $datos[] = [
                'descripcion_servicio' => $descripcion_servicio[$i],
                'centro_servicio' => $centro_servicio[$i],
                'area_servicio' => $area_servicio[$i],
                'cantidad_servicio' => $cantidad_servicio[$i],
                'um_servicio' => $um_servicio[$i],
                'observacion_servicio' => $observacion_servicio[$i],
            ];
        }

        $user_id = auth()->id();
        $logDate = Carbon::now();


        Compras::insert([
            'area' => $request->area,
            'solicitado_por' => $user_id,
            'fecha_elaboracion' => $logDate->format('Y-m-d H:i:s'),
            'jefe_inmediato' => $request->persona_id,
            'fecha_solicitud' => $logDate->format('Y-m-d H:i:s'),
            'fecha_esperada' => date('Y-m-d H:i:s', strtotime($request->fecha_esperada)),
            'tipo_solicitud' => $request->tipo_solicitud,
            'sede' => $request->sede,
            'razon_social' => $request->razon_social,
            'correo_electronico' => $request->correo_contacto,
            'telefono_contacto' => $request->telefono_contacto,
            'servicios' => json_encode($datos),
            'cotizacion1' => $archivo,
            'cotizacion2' => 1,
            'cotizacion3' => 1,
            'detalle_solicitud' => $request->detalle_solicitud,
            'costo_estimado' => $request->costo_estimado,
            'estado_gestion' => 1,
            'estado' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $cod_area = $request->area;
        $date=date('Ymd');
        $new_folder_name='RQS'.'_'.$cod_area.'_'.$date;

       /*  if ($request->hasFile('cotizacion1')) {
            $directory = public_path() . '/sitio/imagenes/cotizaciones/' . $new_folder_name;
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0777, true);
            }
            $file1->move($directory, $cotizacion1);
        }

        if ($request->hasFile('cotizacion2')) {
            $directory = public_path() . '/sitio/imagenes/cotizaciones/' . $new_folder_name;
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0777, true);
            }
            $file2->move($directory, $cotizacion2);
        }

        if ($request->hasFile('cotizacion3')) {
            $directory = public_path() . '/sitio/imagenes/cotizaciones/' . $new_folder_name;
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0777, true);
            }
            $file3->move($directory, $cotizacion3);
        } */

        return redirect()
            ->route('compras.dashboard')
            ->with('mensaje', '¡Formato agregado correctamente!');
    }

    // Funcion que trae los datos de la compras de forma resumida  y lo muestra en el datatable
    // SELECT c.id, u.name , AREA, fecha_solicitud, tipo_solicitud, detalle_solicitud, estado , estado_gestion  FROM compras c  JOIN users u ON c.id= u.id;
    public function dashboardRQS()
    {
        $us = Auth::user();
        $nombreus = $us->username;

        return view('menu.compras.dashboard', compact('nombreus'));
    }

    public function datatable()
    {
        $data = Compras::with('users')->get();

        return datatables()
            ->collection($data)
            ->toJson();
    }

    public function detalle_cotizaciones($id)
    {
        $cotizacion = Compras::find($id);
        return response()->file(public_path(''.$cotizacion1));

    }

    public function estado_RQS($id, Request $request)
    {

        $compra=Compras::find($id);
        $us = Auth::user();
        $nombreus = $us->id;
        $action = $request->input('apr_decl_rqs');

        if ($action == '3') {
            $compra->update(['estado'=>'3' ,
            'autorizado_por' => $nombreus
        ]);
        } elseif ($action == '2') {
            $compra->update(['estado'=>'2',
            'autorizado_por' => $nombreus]);
        }

        return redirect()
            ->route('compras.dashboard');

    }

    public function gestion_RQS($id)
    {

        $compra=Compras::find($id);
        $compra->estado_gestion = 2;
        $compra->save();


        return redirect()
            ->route('compras.dashboard');

    }

    public function show($id)
    {

        $user= Compras::join('users','compras.autorizado_por', '=', 'users.id')
                        ->select('users.id','users.name')
                        ->get();

        $compra = Compras::with('personas:id,nombre_funcionario','users:id,name')->find($id);
        $compraNombreP = $compra->personas->nombre_funcionario;
        $compraNombreU = $compra->users->name;

        $datosJson = $compra->servicios;
        //dd($compra);

        return view('menu.compras.detalle_rqc', compact('compra','compraNombreP','compraNombreU','datosJson'));
    }
}
