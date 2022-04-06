<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion',
        'tipo_agenda', // Entrega == 1, PreEntrega == 2
        'residencia_id',
        'fecha',
        'eliminado'
    ];


    public function residencias()
    {   
        return $this->belongsTo(Departamento::class , 'residencia_id');
    }
}
