<?php

namespace Database\Seeders;

use App\Models\Seccion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrSeccion = [
            'Vestíbulo Elite',
            'Vestíbulo + Sala Tv',

            'Recamara principal',

            'Recamara secundaria 1',
            'Recamara secundaria 2',
            'Recamara secundaria 3',
            'Baño recamara secundaria - 1',
            'Baño recamara secundaria - 2',
            'Terraza recamara Principal',
            'Terraza recamaras Secundarias 1 - 2',
            'Terraza - sala',
            'Terraza - comedor',
            'Terraza',
            'Medio baño',
            'Vestidor recamara principal',
            'Sala de tv',
            'Sala comedor',
            'Cuarto de servicio',
            'Cuarto de lavado',
            'Cocina',

            'Vestíbulo Style Plus',
            'Vestíbulo Style',
            'Vestíbulo Luxury',
        ];


        foreach ($arrSeccion as $seccion) {
            $seccion = Seccion::create([
                "descripcion" => $seccion
            ]);

            $arrListado = [];
            
            switch ($seccion->id) {
                
                // Vestidor Elite
                case 1:
                    $arrListado = [1, 2, 3, 4, 5];
                break;
                // Vestibulo
                case 2:
                    $arrListado = [1, 3, 4, 5, 18];
                break;
                // Vestibulo Style Plus
                case 21:
                    $arrListado = [1, 2, 3, 4, 5, 18];
                break;
                // Vestibulo Style
                case 22:
                    $arrListado = [1, 2, 3, 4, 5, 18];
                break;
                // Vestibulo Luxury
                case 23:
                    $arrListado = [3, 4, 5, 18];
                break;

                default:
                break;
                //
            }
            $seccion->listado()->sync($arrListado);
        }
        
 
    }
}
