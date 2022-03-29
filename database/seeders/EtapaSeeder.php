<?php

namespace Database\Seeders;

use App\Models\Etapa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtapaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrEtapa = ["Torre A", "Torre B", "Torre C"];

        foreach ($arrEtapa as $etapa) {
            Etapa::create([
                "descripcion" => $etapa,
                "desarrollo_id" => 1
            ]);
        }

    }
}
