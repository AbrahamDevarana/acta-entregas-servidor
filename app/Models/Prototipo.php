<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prototipo extends Model
{
    use HasFactory;
    protected $fillable = [ 'descripcion', 'nombre', 'desarrollo_id', 'tipo' ];

    public function residencias(){
        $this->hasMany(Vivienda::class);
    }

    public function secciones(){
        return $this->belongsToMany(Seccion::class, 'seccion_prototipo', 'prototipo_id', 'seccion_id')->withTimestamps();
    }

    public function etapa(){
        return $this->belongsToMany(Etapa::class, 'pivot_etapa_prototipo', 'prototipo_id', 'etapa_id')->withTimestamps();
    }

    public function desarrollo(){
        return $this->belongsTo(Desarrollo::class);
    }
}
