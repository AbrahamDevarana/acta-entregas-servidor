<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'tipoEvidencia',
        'idUser',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function evidencia(){
        return $this->hasMany(Evidencia::class);
    }
}
