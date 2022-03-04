<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDepartamento extends Model
{
    use HasFactory;

    protected $fillable = [ 'descripcion' ];

    public function departamentos(){
        $this->hasMany(Departamento::class);
    }
}
