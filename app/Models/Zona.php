<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    use HasFactory;

    protected $fillable = [ 'descripcion', 'desarrollo_id' ];


    // public function vivienda(){
    //     return $this->belongsToMany(Departamento::class, 'vivienda_seccion', 'seccion_id', 'vivienda_id')->withTimestamps();
    // }

    public function listado(){
        return $this->belongsToMany(Listado::class, 'listado_seccion', 'seccion_id', 'listado_id')->withTimestamps();
    }

    public function desarrollo(){
        return $this->belongsTo(Desarrollo::class);
    }
}
