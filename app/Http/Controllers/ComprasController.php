<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use App\Models\Persona;
use App\Models\Compras;
use App\Models\User;
use App\Models\C_histories;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

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
        //dd($request->all());

        $cod_area = $request->area;
        $date = date('Ymdh');
        $new_folder_name = 'RQS' . '_' . $cod_area . '_' . $date;

        if ($request->hasFile('cotizacion1')) {
            $archivo = $request->file('cotizacion1');
            $directory = public_path() . '/sitio/imagenes/cotizaciones/' . $new_folder_name;
            $url = '/sitio/imagenes/cotizaciones/' . $new_folder_name . '/';
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0777, true);
            }
            $archivo->move($directory, $archivo->getClientOriginalName());
            $cotizacion1 = $url . $archivo->getClientOriginalName();
        } else {
            $cotizacion1 = null;
        }
        if ($request->hasFile('cotizacion2')) {
            $archivo = $request->file('cotizacion2');
            $directory = public_path() . '/sitio/imagenes/cotizaciones/' . $new_folder_name;
            $url = '/sitio/imagenes/cotizaciones/' . $new_folder_name . '/';
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0777, true);
            }
            $archivo->move($directory, $archivo->getClientOriginalName());
            $cotizacion2 = $url . $archivo->getClientOriginalName();
        } else {
            $cotizacion2 = null;
        }
        if ($request->hasFile('cotizacion3')) {
            $archivo = $request->file('cotizacion3');
            $directory = public_path() . '/sitio/imagenes/cotizaciones/' . $new_folder_name;
            $url = '/sitio/imagenes/cotizaciones/' . $new_folder_name . '/';
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0777, true);
            }
            $archivo->move($directory, $archivo->getClientOriginalName());
            $cotizacion3 = $url . $archivo->getClientOriginalName();
        } else {
            $cotizacion3 = null;
        }

        $descripcion_servicio = $request->input('descripcion_servicio');
        $centro_servicio = $request->input('centro_servicio');
        $area_servicio = $request->input('area_servicio');
        $cantidad_servicio = $request->input('cantidad_servicio');
        $cantidad_aprobada = '';
        $um_servicio = $request->input('um_servicio');
        $observacion_servicio = $request->input('observacion_servicio');

        $datos = [];
        for ($i = 0; $i < count($descripcion_servicio); $i++) {
            $datos[] = [
                'descripcion_servicio' => $descripcion_servicio[$i],
                'centro_servicio' => $centro_servicio[$i],
                'area_servicio' => $area_servicio[$i],
                'cantidad_servicio' => $cantidad_servicio[$i],
                'cantidad_aprobada' => $cantidad_aprobada,
                'um_servicio' => $um_servicio[$i],
                'observacion_servicio' => $observacion_servicio[$i],
            ];
        }

        $user_id = auth()->id();
        $logDate = Carbon::now()->setTimezone('America/Bogota');

        $compra = Compras::create([
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
            'cotizacion1' => $cotizacion1,
            'cotizacion2' => $cotizacion2,
            'cotizacion3' => $cotizacion3,
            'detalle_solicitud' => $request->detalle_solicitud,
            'costo_estimado' => $request->costo_estimado,
            'costo_aprobado' => 0,
            'estado_gestion' => 1,
            'estado' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $id = $compra->id;
        $user = Auth::user();
        $responsable = $user->name;
        $fecha_actual = Carbon::now()->setTimezone('America/Bogota');
        C_histories::create(['compra_id' => $id, 'estado' => '1', 'descripcion' => 'Se creo la solicitud RQS', 'responsable' => $responsable, 'fecha_cambio' => $fecha_actual]);

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

    public function estado_RQS($id, Request $request)
    {
        $compra = Compras::find($id);
        $us = Auth::user();
        $nombreus = $us->id;
        $action = $request->input('apr_decl_rqs');
        $action2 = $request->input('apr_rqs');
        $motivo = $request->motivo_rechazo;
        $fecha_actual = Carbon::now()
            ->setTimezone('America/Bogota')
            ->format('Y-m-d H:i:s');

        $fecha_f = Carbon::createFromFormat('Y-m-d', $compra->fecha_esperada);
        $fecha_espe = $fecha_f->addDays(8);

        $compraid = $compra->id;
        $responsable = $us->name;

        if ($action == '3') {
            $compra->update(['estado' => '3', 'autorizado_por' => $nombreus, 'fecha_estado' => $fecha_actual, 'motivo_cancelacion' => $motivo]);
            C_histories::create(['compra_id' => $compraid, 'estado' => '2', 'descripcion' => $motivo, 'responsable' => $responsable, 'fecha_cambio' => $fecha_actual]);
        } elseif ($action2 == '2') {
            $servicios = json_decode($compra->servicios, true);
            $costo_aprobado = $request->input('costo_aprobado');
            foreach ($servicios as &$servicio) {
                $i = array_search($servicio, $servicios);

                $servicio['cantidad_aprobada'] = $request->input('cantidad_aprobada')[$i];
            }
            $compra->update(['estado' => '2', 'autorizado_por' => $nombreus, 'servicios' => json_encode($servicios), 'costo_aprobado' => $costo_aprobado, 'fecha_estado' => $fecha_actual, 'fecha_esperada' => $fecha_espe]);
            C_histories::create(['compra_id' => $compraid, 'estado' => '1', 'descripcion' => 'Aprobado sin problema', 'responsable' => $responsable, 'fecha_cambio' => $fecha_actual]);
        }

        return redirect()->route('compras.dashboard');
    }

    public function gestion_RQS($id, Request $request)
    {
        $compra = Compras::find($id);
        $us = Auth::user();
        $cod_area = $request->area;
        $date = date('Ymdh');
        $new_folder_name = 'RQS' . '_' . $cod_area . '_' . $date;

        $cotizacion1 = $compra->cotizacion1 ?? null; // asigna el valor actual o null si está vacío

        if ($request->hasFile('cotizacion1')) {
            $archivo = $request->file('cotizacion1');
            $directory = public_path() . '/sitio/imagenes/cotizaciones/' . $new_folder_name;
            $url = '/sitio/imagenes/cotizaciones/' . $new_folder_name . '/';
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0777, true);
            }
            $archivo->move($directory, $archivo->getClientOriginalName());
            $cotizacion1 = $url . $archivo->getClientOriginalName();
        }

        $cotizacion2 = $compra->cotizacion2 ?? null;

        if ($request->hasFile('cotizacion2')) {
            $archivo = $request->file('cotizacion2');
            $directory = public_path() . '/sitio/imagenes/cotizaciones/' . $new_folder_name;
            $url = '/sitio/imagenes/cotizaciones/' . $new_folder_name . '/';
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0777, true);
            }
            $archivo->move($directory, $archivo->getClientOriginalName());
            $cotizacion2 = $url . $archivo->getClientOriginalName();
        }
        $cotizacion3 = $compra->cotizacion3 ?? null;

        if ($request->hasFile('cotizacion3')) {
            $archivo = $request->file('cotizacion3');
            $directory = public_path() . '/sitio/imagenes/cotizaciones/' . $new_folder_name;
            $url = '/sitio/imagenes/cotizaciones/' . $new_folder_name . '/';
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0777, true);
            }
            $archivo->move($directory, $archivo->getClientOriginalName());
            $cotizacion3 = $url . $archivo->getClientOriginalName();
        }


        $RQS = $request->input('RQS_continuar');
        $fecha_actual = Carbon::now()
            ->setTimezone('America/Bogota')
            ->format('Y-m-d H:i:s');
        $compraid = $compra->id;
        $responsable = $us->name;
        $compra->update(['estado_gestion' => '2', 'cod_rqs' => $RQS, 'cotizacion1' => $cotizacion1, 'cotizacion2' => $cotizacion2, 'cotizacion3' => $cotizacion3]);
        C_histories::create(['compra_id' => $compraid, 'estado' => '3', 'descripcion' => 'Su orden de compra es ' . $RQS, 'responsable' => $responsable, 'fecha_cambio' => $fecha_actual]);
        return redirect()->route('compras.dashboard');
    }

    public function show($id)
    {
        $jefe = Persona::where('cargo', 'LIKE', '%JEFE%')
            ->orwhere('cargo', 'LIKE', '%DIRECTOR%')
            ->get();

        $c_history = DB::table('compras')
            ->join('c_histories', 'compras.id', '=', 'c_histories.compra_id')
            ->select('c_histories.estado', 'c_histories.descripcion', 'responsable', 'fecha_cambio')
            ->where('compras.id', '=', $id)
            ->get();

        $user = Compras::join('users', 'compras.autorizado_por', '=', 'users.id')
            ->select('users.id', 'users.name')
            ->get();

        $compra = Compras::with('personas:id,nombre_funcionario', 'users:id,name')->find($id);
        $compraNombreP = $compra->personas->nombre_funcionario;
        $compraIdp = $compra->personas->id;
        $compraNombreU = $compra->users->name;

        $datosJson = $compra->servicios;

        return view('menu.compras.detalle_rqc', compact('compra', 'compraNombreP', 'compraIdp', 'compraNombreU', 'datosJson', 'c_history', 'jefe'));
    }

    public function update_RQS(Request $request, $id)
    {
        // dd($request->all());
        $compra = Compras::find($id);

        $servicios = json_decode($compra->servicios, true);

        foreach ($servicios as &$servicio) {
            $i = array_search($servicio, $servicios);
            $servicio['descripcion_servicio'] = $request->input('descripcion_servicio')[$i];
            $servicio['centro_servicio'] = $request->input('centro_servicio')[$i];
            $servicio['area_servicio'] = $request->input('area_servicio')[$i];
            $servicio['cantidad_servicio'] = $request->input('cantidad_servicio')[$i];
            $servicio['cantidad_aprobada'] = '';
            $servicio['um_servicio'] = $request->input('um_servicio')[$i];
            $servicio['observacion_servicio'] = $request->input('observacion_servicio')[$i];
        }

        $cod_area = $request->area;
        $date = date('Ymdh');
        $new_folder_name = 'RQS' . '_' . $cod_area . '_' . $date;

        $cotizacion1 = $compra->cotizacion1 ?? null; // asigna el valor actual o null si está vacío

        if ($request->hasFile('cotizacion1')) {
            $archivo = $request->file('cotizacion1');
            $directory = public_path() . '/sitio/imagenes/cotizaciones/' . $new_folder_name;
            $url = '/sitio/imagenes/cotizaciones/' . $new_folder_name . '/';
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0777, true);
            }
            $archivo->move($directory, $archivo->getClientOriginalName());
            $cotizacion1 = $url . $archivo->getClientOriginalName();
        }

        $cotizacion2 = $compra->cotizacion2 ?? null;

        if ($request->hasFile('cotizacion2')) {
            $archivo = $request->file('cotizacion2');
            $directory = public_path() . '/sitio/imagenes/cotizaciones/' . $new_folder_name;
            $url = '/sitio/imagenes/cotizaciones/' . $new_folder_name . '/';
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0777, true);
            }
            $archivo->move($directory, $archivo->getClientOriginalName());
            $cotizacion2 = $url . $archivo->getClientOriginalName();
        }
        $cotizacion3 = $compra->cotizacion3 ?? null;

        if ($request->hasFile('cotizacion3')) {
            $archivo = $request->file('cotizacion3');
            $directory = public_path() . '/sitio/imagenes/cotizaciones/' . $new_folder_name;
            $url = '/sitio/imagenes/cotizaciones/' . $new_folder_name . '/';
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0777, true);
            }
            $archivo->move($directory, $archivo->getClientOriginalName());
            $cotizacion3 = $url . $archivo->getClientOriginalName();
        }

        $compra->area = $request->input('area');
        $compra->fecha_esperada = date('Y-m-d H:i:s', strtotime($request->input('entrega_esperada')));
        $compra->tipo_solicitud = $request->input('tipo_solicitud');
        $compra->jefe_inmediato = $request->input('persona_id');
        $compra->sede = $request->input('sede');
        $compra->razon_social = $request->input('razon_social');
        $compra->correo_electronico = $request->input('correo_contacto');
        $compra->telefono_contacto = $request->input('telefono_contacto');
        $compra->servicios = json_encode($servicios);
        $compra->detalle_solicitud = $request->input('detalle_solicitud');
        $compra->costo_estimado = $request->input('costo_estimado');
        $compra->cotizacion1 = $cotizacion1;
        $compra->cotizacion2 = $cotizacion2;
        $compra->cotizacion3 = $cotizacion3;
        $compra->save();

        $id = $compra->id;
        $user = Auth::user();
        $responsable = $user->name;
        $fecha_actual = Carbon::now()->setTimezone('America/Bogota');
        C_histories::create(['compra_id' => $id, 'estado' => '4', 'descripcion' => 'Modificacion exitosa !!', 'responsable' => $responsable, 'fecha_cambio' => $fecha_actual]);

        return redirect()->route('compras.show', ['id' => $compra]);
    }

    public function inactivateRecords()
    {
        Artisan::call('rechazar:rqs');

        return response()->json(['message' => 'Registros inactivados']);
    }
}
