<?php

namespace Database\Seeders;

use App\Models\Vivienda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ViviendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Torre 1
        $vivienda = 7;
        $pisos = 11;
        $tipoDpto = 1;

        // Recorre los $pisos
        for ($i=1; $i <= $pisos; $i++) { 
            // Del piso 9+ cambia la cantidad de viviendas a 5
            if($i > 9){
                $vivienda = 5;
            }
        
            // Crea los viviendas por cada piso con sus viviendas
            for ($j=1; $j <= $vivienda; $j++) { 
                if($i < 9){
                    switch ($j) {
                        case 5:
                        case 6:
                            $tipoDpto = 1;
                        break;

                        case 1:
                        case 3:
                        case 4:
                        case 7:
                            $tipoDpto = 4;
                        break;
                        default:
                            $tipoDpto = 2;
                        break;
                    }
                }else{
                    if($j > 3 && $j < 7){
                        $tipoDpto = 1;
                    }
                    switch ($j) {
                        case 4:
                        case 5:
                            $tipoDpto = 1;
                        break;

                        case 1:
                        case 3:
                            $tipoDpto = 4;
                        break;
                        default:
                            $tipoDpto = 2;
                        break;
                    }
                }
                $dpto = Vivienda::create([
                   'piso' => $i,
                   'numero' => $i.'0'.$j,
                   'folio' => 'A-'.$i.'0'.$j,
                   'prototipo_id' => $tipoDpto
                ]);            
                              
                
                switch ($tipoDpto) {
                    case 1:
                        $arr = [];
                        $res = DB::table('seccion_prototipo')->where('prototipo_id', $tipoDpto)->select('seccion_id')->get();
                        foreach ($res as $valor) {
                            array_push($arr, $valor->seccion_id);
                        }
                        $dpto->secciones()->sync($arr);
                    break;
                    case 2:
                        $arr = [];
                        $res = DB::table('seccion_prototipo')->where('prototipo_id', $tipoDpto)->select('seccion_id')->get();
                        foreach ($res as $valor) {
                            array_push($arr, $valor->seccion_id);
                        }
                        $dpto->secciones()->sync($arr);
                    break;
                    case 3:
                        $arr = [];
                        $res = DB::table('seccion_prototipo')->where('prototipo_id', $tipoDpto)->select('seccion_id')->get();
                        foreach ($res as $valor) {
                            array_push($arr, $valor->seccion_id);
                        }
                        $dpto->secciones()->sync($arr);
                    break;
                    case 4:
                        $arr = [];
                        $res = DB::table('seccion_prototipo')->where('prototipo_id', $tipoDpto)->select('seccion_id')->get();
                        foreach ($res as $valor) {
                            array_push($arr, $valor->seccion_id);
                        }
                        $dpto->secciones()->sync($arr);
                    break;

                }                
            }
        }
    }
}


