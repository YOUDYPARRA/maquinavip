<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    protected $table='pagos';
    protected $fillable=[
        'id_modelo',
        'id_nombre',
        'nombre',
        'observacion',
        'monto'
    ];
    
}
