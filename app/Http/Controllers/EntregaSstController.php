<?php

namespace App\Http\Controllers;

use App\Models\Entrega_ssts;
use App\Models\Articulos_ssts;
use App\Models\Detalle_entrega_sst;
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

        return view('menu.SST.entrega_sst', compact('person'));
    }

    public function datatable()
    {
        $articulos = Articulos_ssts::select('id', 'descripcion')
            ->where('estado', '=', 1)
            ->get();

        return datatables()
            ->collection(
                Articulos_ssts::select('id', 'descripcion')
                    ->where('estado', '=', 1)
                    ->get(),
            )
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        DB::beginTransaction();

        try {
            // Crear registro de  entrega
            $user_id = auth()->id();

            $entrega = Entrega_ssts::create([
                'usuario' => $user_id,
                'persona_id' => $request->persona_id_sst,
                'fecha_entrega' => date('Y-m-d H:i:s', strtotime($request->fecha_entrega_sst)),
                'firma' => $request->input('draw_dataUrl'),
                'firma_sgsst' => $request->input('draw_dataUrl2'),
            ]);

            // Crear registro de detalle de entrega para cada artículo

            $articulos_sst = $request->input('articulos_sst');
            $cantidad_articulos = $request->input('cantidad_articulos');
            $observaciones_sst = $request->input('observaciones_sst');

            $articulos = [];

            for ($i = 0; $i < count($articulos_sst); $i++) {
                $articulos[] = [
                    'articulos_id' => $articulos_sst[$i],
                    'cantidad_articulos' => $cantidad_articulos[$i],
                ];
            }

            foreach ($articulos as $articulo) {
                Detalle_entrega_sst::create([
                    'entregas_id' => $entrega->id,
                    'articulos_id' => $articulo['articulos_id'],
                    'cantidad_entregada' => $articulo['cantidad_articulos'],
                    'observaciones' => $request->observaciones_sst,
                ]);
            }
            /*  dd($request->all()); */

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
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
    public function show_persona($id)
    {
        /* SELECT p.nombre_funcionario, e.fecha_entrega,a.descripcion,de.cantidad_entregada,  e.firma ,
        e.firma_sgsst FROM personas p join entrega_ssts e ON p.id=e.persona_id join detalle_entrega_ssts de
         ON e.id=de.entregas_id JOIN articulos_ssts a ON de.articulos_id=a.id WHERE e.persona_id = 7;  */

        $persona_art = DB::table('personas')
            ->join('entrega_ssts', 'personas.id', '=', 'entrega_ssts.persona_id')
            ->join('detalle_entrega_ssts', 'entrega_ssts.id', '=', 'detalle_entrega_ssts.entregas_id')
            ->join('articulos_ssts', 'detalle_entrega_ssts.articulos_id', '=', 'articulos_ssts.id')
            ->select('personas.nombre_funcionario', 'entrega_ssts.fecha_entrega', 'articulos_ssts.descripcion', 'detalle_entrega_ssts.cantidad_entregada', 'entrega_ssts.firma', 'entrega_ssts.firma_sgsst')
            ->where('entrega_ssts.persona_id', '=', $id)
            ->get();

        return $persona_art->toJson();
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
