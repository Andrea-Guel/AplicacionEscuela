<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class materia extends Model
{
    protected $fillable = ['id','nombre', 'descripcion', 'cuatrimestre'];
    //protected $table = 'materias';
    // Relación muchos a muchos con Profesores
    public function profesores()
    {
        return $this->belongsToMany(maestro::class, 'profesor_materia');
    }
}
