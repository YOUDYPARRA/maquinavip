<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquinero extends Model
{
    use HasFactory;
    protected $table='maquineros';
    protected $fillable=[
        'id_modelo',
        'id_nombre',
        'talla',
        'cantidad',
        'nombre',
        'hilo_recta',
        'hilo_over',
        'tipo',
        'observacion'
    ];


}
