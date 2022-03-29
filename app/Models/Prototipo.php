<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prototipo extends Model
{
    use HasFactory;
    protected $fillable = [ 'descripcion', 'nombre', 'etapa_id' ];

    public function viviendas(){
        $this->hasMany(Vivienda::class);
    }

    public function secciones(){
        return $this->belongsToMany(Seccion::class, 'seccion_prototipo', 'prototipo_id', 'seccion_id')->withTimestamps();
    }

    public function etapa(){
        return $this->belongsTo(Etapa::class);
    }
}
