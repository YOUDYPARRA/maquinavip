<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//acumula las 
class Manufactura extends Model
{
    use HasFactory;
    protected $table='manufacturas';
    protected $fillable=['nombre',
    'id_modelo','modelo','cantidad','imagen','bandera','observacion'];
}
