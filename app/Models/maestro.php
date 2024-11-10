<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class maestro extends Model
{
    protected $fillable = ['id','nombre', 'apellido', 'edad', 'genero', 'tel'];
    //protected $table = 'maestros';

    // Relación muchos a muchos con Materias
    public function materias()
    {
        return $this->belongsToMany(materia::class, 'profesor_materia');
    }
}
