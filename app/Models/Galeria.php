<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    use HasFactory;

    protected $fillable = [
        'foto_id',
        'evidencia_id',
        'estatusEvidencia',
    ];

    public function fotos(){
        return $this->hasMany(Fotos::class);
    }

    public function evidencia(){
        return $this->belongsTo(Evidencia::class);
    }
}
