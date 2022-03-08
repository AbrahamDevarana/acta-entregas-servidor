<?php

namespace Database\Seeders;

use App\Models\Listado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ListadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Listado::create([
            "descripcion" => "Piso porcelánico rectificado",
            "tipoListado" => 1
        ]);
        Listado::create([
            "descripcion" => "Ventanería premium en aluminio obscuro",
            "tipoListado" => 1
        ]);
        Listado::create([
            "descripcion" => "Acabado de granito en cocina",
            "tipoListado" => 1
        ]);
        Listado::create([
            "descripcion" => "Monomando tipo extraíble en cocina",
            "tipoListado" => 1
        ]);

    }
}
