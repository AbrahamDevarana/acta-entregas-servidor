<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desarrollo extends Model
{
    use HasFactory;

    protected $fillable = ["descripcion", "url"];

    public function etapas(){
        return $this->hasMany(Etapa::class);
    }
}
