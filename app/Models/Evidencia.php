<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evidencia extends Model
{
    use HasFactory;

    protected $fillable = [
    'id_departamento_listado',
    'id_evidencia',
    'comentarios',
    'id_status',
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
