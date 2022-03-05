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
        'id_cliente',
        'id_tipoDpto'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tipoDepartamento(){
        return $this->hasOne(TipoDepartamento::class);
    }

    public function secciones(){
        return $this->belongsToMany(Seccion::class, 'departamento_seccion', 'id_departamento', 'id_seccion');
    }

    public function listado(){
        return $this->belongsToMany(Listado::class, 'departamento_listado', 'id_departamento', 'id_listado');
    }

}
