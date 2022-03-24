<?php

namespace Database\Seeders;

use App\Models\Desarrollos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesarrollosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrDesarrollos = ["Royal View"];

        foreach ($arrDesarrollos as $desarrollo) {
            Desarrollos::create([
                "descripcion" => $desarrollo
            ]);
        }
    }
}
