<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    public function viviendaCalendar(){
        $viviendasEntrega = DB::table('viviendas')
                        ->leftJoin('tipo_viviendas', 'tipo_viviendas.id', '=', 'viviendas.tipo_vivienda_id')
                        ->select('tipo_viviendas.nombre as tipoDepartamento', 'viviendas.fechaEntrega as date')
                        ->get();


        $viviendasPreentrega = DB::table('viviendas')
        ->leftJoin('tipo_viviendas', 'tipo_viviendas.id', '=', 'viviendas.tipo_vivienda_id')
        ->select('tipo_viviendas.nombre as tipoDepartamento', 'viviendas.fechaPreEntrega as date' )
        ->get();





        return response()->json([
            'viviendasEntrega' => $viviendasEntrega,
            'viviendasPreentrega' => $viviendasPreentrega
        ]);
    }
}
