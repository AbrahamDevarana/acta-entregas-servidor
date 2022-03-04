<?php

namespace Database\Seeders;

use App\Models\TipoDepartamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoDepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrDptos = ['Style', 'Elite', 'Style Plus', 'Luxury'];

        foreach ($arrDptos as $dpto) {
            TipoDepartamento::create([
                "nombre" => $dpto,
                'descripcion' => 'Tipo'
            ]);
        }

    }
}
