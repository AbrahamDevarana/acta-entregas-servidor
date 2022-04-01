<?php

namespace Database\Seeders;

use App\Models\Prototipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrototipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrDptos = ['Style', 'Elite', 'Style Plus', 'Luxury', 'Majestic', 'Unique'];

        foreach ($arrDptos as $dpto) {
            $tipoDpto = Prototipo::create([
                "nombre" => $dpto,
                'descripcion' => 'Departamento'
            ]);

            switch ($tipoDpto->id) {
                case 1:
                    $arr = [1, 14, 3, 12, 5, 7, 20, 15, 18, 13, 21];
                break;
                case 2:
                    $arr = [1, 16, 10, 3, 7, 4, 11, 5, 8, 15, 17, 18, 19, 20, 21];
                break;
                case 3:
                    $arr = [1, 20, 15, 17, 7, 4, 14, 3, 16, 18, 21];
                break;
                case 4:
                    $arr = [2, 14, 7, 4, 8, 5, 3, 6, 9, 18, 13, 19, 20, 23];
                break;            
            }

            $tipoDpto->secciones()->sync($arr);

        }
    }
}
