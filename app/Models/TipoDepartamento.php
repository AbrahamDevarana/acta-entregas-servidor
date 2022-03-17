<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDepartamento extends Model
{
    use HasFactory;

    protected $fillable = [ 'descripcion' ];

    public function departamentos(){
        $this->hasMany(Departamento::class);
    }

    public function secciones(){
        return $this->belongsToMany(Seccion::class, 'seccion_tipo_departamento', 'tipo_departamento_id', 'seccion_id')->withTimestamps();
    }
}
