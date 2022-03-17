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
        'departamento_id',
        'fecha',
        'eliminado'
    ];


    public function departamentos()
    {   
        return $this->belongsTo(Departamento::class , 'departamento_id');
    }
}
