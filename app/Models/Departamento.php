<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'folio',
        'piso',
        'fechaEntrega',
        'fechaEntregado',
        'cliente_id',
        'tipo_departamento_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tipoDepartamento(){
        return $this->hasOne(TipoDepartamento::class);
    }

    public function secciones(){
        return $this->belongsToMany(Seccion::class, 'departamento_seccion', 'departamento_id', 'seccion_id')->withTimestamps();
    }

    public function listado(){
        return $this->belongsToMany(Listado::class, 'departamento_listado', 'departamento_id', 'listado_id')->withTimestamps();
    }

}
