<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Http\Requests\StoreDepartamentoRequest;
use App\Http\Requests\UpdateDepartamentoRequest;
use App\Models\Seccion;
use Illuminate\Support\Facades\DB;

class DepartamentoController extends Controller
{

    public function index()
    {
        $departamentos = DB::table('departamentos')
                        ->leftJoin('users', 'users.id' , '=', 'departamentos.cliente_id')
                        ->leftJoin('tipo_departamentos', 'tipo_departamentos.id', '=', 'departamentos.tipo_departamento_id')
                        ->select('departamentos.*', 'users.name as cliente', 'tipo_departamentos.nombre as tipoDepartamento', 
                                 'departamentos.fechaEntrega as date', DB::raw("CONCAT( 'Departamento ', folio ) as title"), 
                                 DB::raw("CONCAT( 'red' ) as color", 'departamentos.fechaPreEntrega as date', DB::raw("CONCAT( 'blue' ) as color")))
                        // ->select('departamentos.fechaEntrega as date', DB::raw("CONCAT( 'Departamento ', folio ) as title"))
                        ->get();
        return response()->json([
            'departamento' => $departamentos
        ]);
    }

    public function edit(Departamento $departamento){

        $departamento = Departamento::with("listado")->with('secciones')->findOrFail($departamento->id);
        return response()->json([
            'departamento' => $departamento,
            // 'listado' => $listado
        ]);
    }

    public function update(UpdateDepartamentoRequest $request, Departamento $departamento)
    {
        $request->validated();
        $departamento->descripcion = $request['descripcion'];
        $departamento->save();
        return response()->json([
            'departamento' => $departamento
        ]);
    }

    public function destroy(Departamento $departamento)
    {
        $departamento->eliminado = 1;
        $departamento->save();
        return response()->json([
            'departamento' => $departamento
        ]);
    }

    public function obtenerSecciones($id){

        // $secciones = Departamento::with("secciones:id")->findOrFail(1);
        // $secciones = Departamento::all()->load('secciones')->load('listado');
        // $departamento_seccion = Departamento::with('secciones')->with('listado')->findOrFail($id);

        $seccion = Seccion::with('listado')->get();
        return response()->json([
            'seccion' => $seccion
        ]);
    }

}
