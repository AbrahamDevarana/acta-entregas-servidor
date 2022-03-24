<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoVivienda extends Model
{
    use HasFactory;
    protected $fillable = [ 'descripcion', 'nombre', 'desarrollo_id' ];

    public function viviendas(){
        $this->hasMany(Vivienda::class);
    }

    public function secciones(){
        return $this->belongsToMany(Seccion::class, 'seccion_tipo_vivienda', 'tipo_vivienda_id', 'seccion_id')->withTimestamps();
    }

    public function desarrollo(){
        return $this->belongsTo(Desarrollos::class);
    }
}
