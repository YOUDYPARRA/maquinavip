<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumnos extends Model
{
    use HasFactory;
    protected $table = 'alumnos';
    protected $fillable=['nombre','apellido_paterno','apellido_materno','id_grupo','fecha_nacimiento','equipo','observacion','correo','id_grupo'];
}
