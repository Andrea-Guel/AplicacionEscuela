<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profesorMateria extends Model
{
    protected $fillable = ['id','maestro_id','materia_id'];
    protected $table = 'profesor_materia';
}
