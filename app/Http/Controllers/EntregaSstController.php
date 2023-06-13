<?php

namespace App\Http\Controllers;

use App\Models\Entrega_ssts;
use App\Models\Articulos_ssts;
use App\Models\Detalle_entrega_sst;
use App\Models\Detalle_inventario_sst;
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
        $articulos = Articulos_ssts::select('id', 'nombre')
            ->where('estado', '=', 1)
            ->get();

        return datatables()
            ->collection(
                Articulos_ssts::select('id', 'nombre')
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
                $detalle_inventario = Detalle_inventario_sst::where('articulos_id', $articulo['articulos_id'])->first();

                if ($detalle_inventario) {
                    $cantidad_disponible = $detalle_inventario->cantidad_disponible;

                    if ($cantidad_disponible >= $articulo['cantidad_articulos']) {
                        $cantidad_actualizada = $cantidad_disponible - $articulo['cantidad_articulos'];
                        $detalle_inventario->cantidad_disponible = $cantidad_actualizada;
                        $detalle_inventario->save();

                        // Verificar si la cantidad disponible llegó a cero y actualizar el estado del artículo
                        if ($cantidad_actualizada === 0) {
                            $articulo = Articulos_ssts::find($articulo['articulos_id']);
                            $articulo->estado = '3';
                            $articulo->save();
                        }
                    }
                }
            }

            DB::commit();
            return redirect()
                ->route('sst')
                ->with('mensaje', '¡Articulos agregado correctamente!');
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
        /* SELECT p.nombre_funcionario, e.fecha_entrega,a.nombre,de.cantidad_entregada,  e.firma ,
        e.firma_sgsst FROM personas p join entrega_ssts e ON p.id=e.persona_id join detalle_entrega_ssts de
         ON e.id=de.entregas_id JOIN articulos_ssts a ON de.articulos_id=a.id WHERE e.persona_id = 7;  */

        $persona_art = DB::table('personas')
            ->join('entrega_ssts', 'personas.id', '=', 'entrega_ssts.persona_id')
            ->join('detalle_entrega_ssts', 'entrega_ssts.id', '=', 'detalle_entrega_ssts.entregas_id')
            ->join('articulos_ssts', 'detalle_entrega_ssts.articulos_id', '=', 'articulos_ssts.id')
            ->select('personas.nombre_funcionario', 'entrega_ssts.fecha_entrega', 'articulos_ssts.nombre', 'detalle_entrega_ssts.cantidad_entregada', 'entrega_ssts.firma', 'entrega_ssts.firma_sgsst')
            ->where('entrega_ssts.persona_id', '=', $id)
            ->get();

        return $persona_art->toJson();
    }

    public function show_cantidad_d ($id){
        //SELECT a.id,sum(di.cantidad_disponible) fROM articulos_ssts a left JOIN detalle_inventario_ssts di ON  a.id=di.articulos_id GROUP BY a.id;
         $articulo_d = DB::table('articulos_ssts')
         ->leftjoin('detalle_inventario_ssts','articulos_ssts.id','=','detalle_inventario_ssts.articulos_id' )
         ->selectRaw('sum(detalle_inventario_ssts.cantidad_disponible) AS cantidad')
         ->where('articulos_ssts.id' ,'=',$id)
         ->groupBy('articulos_ssts.id')
         ->get();

         return $articulo_d->toJson();
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
