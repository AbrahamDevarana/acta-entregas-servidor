<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evidencia extends Model
{
    use HasFactory;

    protected $fillable = [
    'vivienda_listado_id',
    'evidencia_id',
    'comentarios',
    'status_id',
    ];


    public function listado(){
        return '';
    }

    public function reporte(){
        return $this->belongsTo(Reporte::class);
    }

    public function galeria(){
        return $this->hasOne(Galeria::class);
    }


}
