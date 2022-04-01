<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etapa extends Model
{
    use HasFactory;

    protected $fillable = [ 'descripcion', 'desarrollo_id' ];

    public function prototipos(){
        return $this->belongsToMany(Prototipo::class, 'pivot_etapa_prototipo', 'etapa_id', 'prototipo_id')->withTimestamps();
    }
}
