<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residencia extends Model
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
        return $this->belongsTo(Prototipo::class);
    }

    public function listadoMany(){
        return $this->belongsToMany(Listado::class, 'pivot_residencia_vivienda_zona')->withTimestamps()->withPivot('seccion_id');
    }

    public function seccionMany(){
        return $this->belongsToMany(Seccion::class, 'pivot_residencia_vivienda_zona')->withTimestamps()->withPivot('listado_id');
    }
}



//     public function belongsToMany($related, $table = null, $foreignPivotKey = null, $relatedPivotKey = null, $parentKey = null, $relatedKey = null, $relation = null)
