<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Torre 1
        $departamento = 7;
        $pisos = 11;
        $tipoDpto = 1;

        // Recorre los $pisos
        for ($i=1; $i <= $pisos; $i++) { 
            // Del piso 9+ cambia la cantidad de departamentos a 5
            if($i > 9){
                $departamento = 5;
            }
        
            // Crea los departamentos por cada piso con sus departamentos
            for ($j=1; $j <= $departamento; $j++) { 
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
                $dpto = Departamento::create([
                   'piso' => $i,
                   'numero' => $i.'0'.$j,
                   'folio' => 'A-'.$i.'0'.$j,
                   'tipo_departamento_id' => $tipoDpto
                ]);            
                              
                
                switch ($tipoDpto) {
                    case 1:
                        $arr = [];
                        $res = DB::table('seccion_tipo_departamento')->where('tipo_departamento_id', $tipoDpto)->select('seccion_id')->get();
                        foreach ($res as $valor) {
                            array_push($arr, $valor->seccion_id);
                        }
                        $dpto->secciones()->sync($arr);
                    break;
                    case 2:
                        $arr = [];
                        $res = DB::table('seccion_tipo_departamento')->where('tipo_departamento_id', $tipoDpto)->select('seccion_id')->get();
                        foreach ($res as $valor) {
                            array_push($arr, $valor->seccion_id);
                        }
                        $dpto->secciones()->sync($arr);
                    break;
                    case 3:
                        $arr = [];
                        $res = DB::table('seccion_tipo_departamento')->where('tipo_departamento_id', $tipoDpto)->select('seccion_id')->get();
                        foreach ($res as $valor) {
                            array_push($arr, $valor->seccion_id);
                        }
                        $dpto->secciones()->sync($arr);
                    break;
                    case 4:
                        $arr = [];
                        $res = DB::table('seccion_tipo_departamento')->where('tipo_departamento_id', $tipoDpto)->select('seccion_id')->get();
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


