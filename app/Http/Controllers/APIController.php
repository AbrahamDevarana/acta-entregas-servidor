<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    public function departamentoCalendar(){
        $departamentosEntrega = DB::table('departamentos')
                        ->leftJoin('tipo_departamentos', 'tipo_departamentos.id', '=', 'departamentos.tipo_departamento_id')
                        ->select('tipo_departamentos.nombre as tipoDepartamento', 'departamentos.fechaEntrega as date')
                        ->get();


        $departamentosPreentrega = DB::table('departamentos')
        ->leftJoin('tipo_departamentos', 'tipo_departamentos.id', '=', 'departamentos.tipo_departamento_id')
        ->select('tipo_departamentos.nombre as tipoDepartamento', 'departamentos.fechaPreEntrega as date' )
        ->get();





        return response()->json([
            'departamentosEntrega' => $departamentosEntrega,
            'departamentosPreentrega' => $departamentosPreentrega
        ]);
    }
}
