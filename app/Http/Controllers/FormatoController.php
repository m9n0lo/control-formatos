<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formato;
use App\Models\Persona;
use DB;

class FormatoController extends Controller
{
    public function index()
    {
        $person = Persona::select('id', 'nombre_funcionario')->get();
        $for = Formato::all();

        return view('menu.formato.formato', compact('for', 'person'));
    }

    public function firma()
    {
        $format['titulo'] = 'Inicio | Firma';

        return view('menu.formato.firma', $format);
    }

    // Funcion que trae los datos para guardar el formato
    //SELECT area ,nombre_funcionario FROM usuarios GROUP BY area, nombre_funcionario ORDER BY area ASC ;
    /*     public function create()
    {
        $users = Usuario::select('area', 'nombre_funcionario')
            ->groupBy('area', 'nombre_funcionario')
            ->get();
        
      
    } */

    // funcion que insertar los datos obtenidos en los campos a la BD.
    public function GuardarFormato(Request $request)
    {
        $file1 = request()->file('firma');
        $firma = $file1->getClientOriginalName();
        $user_id = auth()->id();

        Formato::insert([
            'users_id' =>    $user_id,
            'persona_id' => $request->persona_id,
            'nombre_equipo' => $request->nombre_equipo,
            'fecha_mant_est' => date('Y-m-d H:i:s', strtotime($request->fecha_mant_est)),
            'fecha_retiro' => date('Y-m-d H:i:s', strtotime($request->fecha_retiro)),
            'fecha_entrega' => date('Y-m-d H:i:s', strtotime($request->fecha_entrega)),
            'observaciones' => $request->observaciones,
            'firma' => $firma,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        if ($request->hasFile('firma')) {
            $file1->move(public_path() . '/sitio/imagenes/firmas/', $firma);
        }

        return redirect()
            ->route('formato')
            ->with('mensaje', '¡Formato agregado correctamente!');
    }

    // funcion que trae los datos de la BD y lo convierte a tipo JSON para mostrarlos en el datatables.
    // Consulta SQL que se utilizo
    /* SELECT nombre_funcionario, nombre_equipo,fecha_mant_est,fecha_retiro,fecha_entrega,observaciones,firma FROM formatos f JOIN usuarios u ON u.id=f.usuario_id ; */
    public function datatable()
    {
        $data = Formato::with('personas','users')->get();

        /* return $data; */
        return datatables()
            ->collection(Formato::with('personas','users')->get())
            ->toJson();
    }
 
    public function EditFormat($id)
    {
        if (request()->ajax()) {
            $data = Formato::find($id);

            return response()->json(['result' => $data]);
        }
    }

    public function UpdateFormat(Request $request)
    {
        $form_data = [
            'nombre_equipo' => $request->nombre_equipo_m,
            'fecha_mant_est' => date('Y-m-d H:i:s', strtotime($request->fecha_mant_est_m)),
            'fecha_retiro' => date('Y-m-d H:i:s', strtotime($request->fecha_retiro_m)),
            'fecha_entrega' => date('Y-m-d H:i:s', strtotime($request->fecha_entrega_m)),
            'observaciones' => $request->observaciones_m,
        ];

        Formato::whereId($request->hidden_id)->update($form_data);
        /* return $form_data; */
        return response()->json(['success' => 'Formato actualizado correctamente!!']);
    }
}
