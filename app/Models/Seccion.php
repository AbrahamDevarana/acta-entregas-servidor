<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;

    protected $fillable = [ 'descripcion' ];


    public function departamento(){
        return $this->belongsToMany(Departamento::class, 'departamento_seccion', 'id_seccion', 'id_departamento');
    }

    public function listado(){
        return $this->belongsToMany(Listado::class, 'listado_seccion','id_seccion','id_listado');
    }
}
