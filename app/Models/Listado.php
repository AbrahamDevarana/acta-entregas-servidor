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
        'desarrollo_id'
    ];

    public function viviendas(){
        return $this->belongsToMany(Departamento::class, 'vivienda_listado', 'listado_id', 'vivienda_id');
    }

    public function seccion(){
        return $this->belongsToMany(Seccion::class, 'listado_seccion', 'listado_id', 'seccion_id');
    }

    public function desarrollo(){
        return $this->belongsTo(Desarrollo::class);
    }
}
