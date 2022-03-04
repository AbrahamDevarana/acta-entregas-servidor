<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrStatus = ['Disponible', 'ErrorCliente', 'ErrorCalidad', 'SolucionCalidad', 'SolucionCliente', 'Cerrado'];
            foreach ($arrStatus as  $status) {
                DB::table('status')->insert([
                    'descripcion' => $status
                ]);
            }
        }
}
