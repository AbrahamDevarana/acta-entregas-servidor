<?php

namespace App\Http\Controllers;

use App\Models\Residencia;
use App\Http\Requests\StoreResidenciaRequest;
use App\Http\Requests\UpdateResidenciaRequest;
use App\Models\Seccion;
use Illuminate\Support\Facades\DB;

class ResidenciaController extends Controller
{

    public function index()
    {
        $residencias = DB::table('residencias')
                        ->leftJoin('users', 'users.id' , '=', 'residencias.cliente_id')
                        ->leftJoin('prototipos', 'prototipos.id', '=', 'residencias.prototipo_id')
                        ->select('residencias.*', 'users.name as cliente', 'prototipos.nombre as tipoResidencia', 'prototipos.tipo', 
                                 'residencias.fechaEntrega as date', DB::raw("CONCAT( 'Residencia ', folio ) as title"), 
                                 DB::raw("CONCAT( 'red' ) as color", 'residencias.fechaPreEntrega as date', DB::raw("CONCAT( 'blue' ) as color")))
                        // ->select('residencias.fechaEntrega as date', DB::raw("CONCAT( 'Residencia ', folio ) as title"))
                        ->get();
        return response()->json([
            'residencia' => $residencias
        ]);
    }

    public function edit(Residencia $residencium){

        $residencium = Residencia::with('prototipo.secciones')->with('listadoMany')->findOrFail($residencium->id);
        return response()->json([
            'residencia' => $residencium,
            // 'listado' => $listado
        ]);
    }

    public function update(UpdateResidenciaRequest $request, Residencia $residencium)
    {
        $seccion = $request['seccion_id'];
        $listado = $request['listado'];
        
        DB::beginTransaction();

        foreach ($listado as $lista) {
            try {
                $residencium->seccionMany()->attach($seccion, ['listado_id' => $lista]);
            } catch (\Throwable $th) {
                DB::rollback();
                return response()->json([
                    'message' => 'Error al guardar la residencia',
                    'error' => $th
                ]);
            }
        }

        $residencium = Residencia::with('prototipo.secciones')->with('listadoMany')->findOrFail($residencium->id);

        return response()->json([
            'residencia' => $residencium
        ]);

    }

    public function destroy(Residencia $residencium)
    {
        $residencium->eliminado = 1;
        $residencium->save();
        return response()->json([
            'residencia' => $residencium
        ]);
    }

    public function asignarListado(Residencia $residencium){
        
    }

}
