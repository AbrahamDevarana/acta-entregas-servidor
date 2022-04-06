<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    public function residenciaCalendar(){
        $residenciasEntrega = DB::table('residencias')
                        ->leftJoin('tipo_residencias', 'tipo_residencias.id', '=', 'residencias.tipo_residencia_id')
                        ->select('tipo_residencias.nombre as tipoDepartamento', 'residencias.fechaEntrega as date')
                        ->get();


        $residenciasPreentrega = DB::table('residencias')
        ->leftJoin('tipo_residencias', 'tipo_residencias.id', '=', 'residencias.tipo_residencia_id')
        ->select('tipo_residencias.nombre as tipoDepartamento', 'residencias.fechaPreEntrega as date' )
        ->get();





        return response()->json([
            'residenciasEntrega' => $residenciasEntrega,
            'residenciasPreentrega' => $residenciasPreentrega
        ]);
    }
}
