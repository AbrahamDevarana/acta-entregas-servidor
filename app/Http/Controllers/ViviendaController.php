<?php

namespace App\Http\Controllers;

use App\Models\Vivienda;
use App\Http\Requests\StoreViviendaRequest;
use App\Http\Requests\UpdateViviendaRequest;
use App\Models\Seccion;
use Illuminate\Support\Facades\DB;

class ViviendaController extends Controller
{

    public function index()
    {
        $viviendas = DB::table('viviendas')
                        ->leftJoin('users', 'users.id' , '=', 'viviendas.cliente_id')
                        ->leftJoin('prototipos', 'prototipos.id', '=', 'viviendas.prototipo_id')
                        ->select('viviendas.*', 'users.name as cliente', 'prototipos.nombre as tipoVivienda', 'prototipos.tipo', 
                                 'viviendas.fechaEntrega as date', DB::raw("CONCAT( 'Vivienda ', folio ) as title"), 
                                 DB::raw("CONCAT( 'red' ) as color", 'viviendas.fechaPreEntrega as date', DB::raw("CONCAT( 'blue' ) as color")))
                        // ->select('viviendas.fechaEntrega as date', DB::raw("CONCAT( 'Vivienda ', folio ) as title"))
                        ->get();
        return response()->json([
            'vivienda' => $viviendas
        ]);
    }

    public function edit(Vivienda $vivienda){

        $vivienda = Vivienda::with('secciones')->findOrFail($vivienda->id);
        return response()->json([
            'vivienda' => $vivienda,
            // 'listado' => $listado
        ]);
    }

    public function update(UpdateViviendaRequest $request, Vivienda $vivienda)
    {
        $request->validated();
        $vivienda->descripcion = $request['descripcion'];
        $vivienda->save();
        return response()->json([
            'vivienda' => $vivienda
        ]);
    }

    public function destroy(Vivienda $vivienda)
    {
        $vivienda->eliminado = 1;
        $vivienda->save();
        return response()->json([
            'vivienda' => $vivienda
        ]);
    }

    public function obtenerSecciones($id){

        // $secciones = Vivienda::with("secciones:id")->findOrFail(1);
        // $secciones = Vivienda::all()->load('secciones')->load('listado');
        // $vivienda_seccion = Vivienda::with('secciones')->with('listado')->findOrFail($id);

        $seccion = Seccion::with('listado')->get();
        return response()->json([
            'seccion' => $seccion
        ]);
    }

}
