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
        $lista = [
        "Puerta de acceso",
        "Cristal medio muro",
        "Luminarias y spots",
        "Apagadores y contactos",
        "Acabado en muros y plafones ",
        "Vanity",
        "Closet de blancos",
        "Ovalin",
        "Monomandos",
        "Espejo",
        "Ventana de proyección",
        "Cancel esmerilado regadera",
        "Cancel esmerilado wc",
        "Wc",
        "Accesorios de baños",
        "Regadera",
        "Closets",
        "Piso",
        "Piso decorativo",
        "Puerta intercomunicación",
        "Cancel",
        "Barandal",
        "Puerta nicho de calentador",
        "Calentador",
        "Lavamanos",
        "Mezcladora",
        "Lavadero"];
        
        foreach ($lista as $value) {
            Listado::create([
                "descripcion" => $value,
                "tipoListado" => 1,
                "desarrollo_id" => 1
            ]);
        }


    }
}
