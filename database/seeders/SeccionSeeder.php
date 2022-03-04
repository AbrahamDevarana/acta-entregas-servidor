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
        $arrSeccion = ['Terraza', 'Vestibulo', 'Cocina', 'Sala de TV', 'Master Suite', 'Sala', 'Comedor'];

        foreach ($arrSeccion as $seccion) {
            Seccion::create([
                "descripcion" => $seccion
            ]);
        }
    }
}
