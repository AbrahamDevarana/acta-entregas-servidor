<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call([
           UserSeeder::class,
           PrototipoSeeder::class,
           ListadoSeeder::class,
           SeccionSeeder::class,
           ViviendaSeeder::class,
           DesarrollosSeeder::class,
           EtapaSeeder::class
       ]);
    }
}
