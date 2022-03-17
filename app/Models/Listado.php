<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listado extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'tipoListado',
    ];

    public function departamentos(){
        return $this->belongsToMany(Departamento::class, 'departamento_listado', 'listado_id', 'departamento_id');
    }

    public function seccion(){
        return $this->belongsToMany(Seccion::class, 'listado_seccion', 'listado_id', 'seccion_id');
    }
}
