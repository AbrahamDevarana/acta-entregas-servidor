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

    public function zonas(){
        return $this->belongsToMany(Zona::class, 'pivot_prototipo_zona', 'prototipo_id', 'zona_id')->withTimestamps();
    }

    public function etapa(){
        return $this->belongsToMany(Etapa::class, 'pivot_etapa_prototipo', 'prototipo_id', 'etapa_id')->withTimestamps();
    }

    public function desarrollo(){
        return $this->belongsToMany(Desarrollo::class, 'pivot_desarrollo_prototipo', 'prototipo_id', 'desarrollo_id')->withTimestamps();
    }
}
