<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vivienda extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'folio',
        'piso',
        'fechaEntrega',
        'fechaEntregado',
        'cliente_id',
        'prototipo_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function prototipo(){
        return $this->hasOne(Prototipo::class);
    }

    public function secciones(){
        return $this->belongsToMany(Seccion::class, 'vivienda_seccion', 'vivienda_id', 'seccion_id')->withTimestamps();
    }


}
