<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//acumula las 
class Manufactura extends Model
{
    // use SoftDeletes;
    use HasFactory;
    protected $table='manufacturas';
    protected $fillable=['nombre',
    'id_modelo','modelo','cantidad','imagen','bandera','observacion','color','talla',
    'tienda',
    'numero_orden',
    'fecha_entrega',
    'total_corte',
    'fecha_limite'
];
    //Scope para Buscar, Scope para Total , Scope Para total por maquinero.
    public function scopeCantidades($query,$id_modelo)
    {
        return $query->where('id_modelo', $id_modelo)
        ->where('bandera','C');
    }
    public function scopeTotalmaquinero($query,Array $cantidad)
    {
        $id=$cantidad['id'];
        $nombre=$cantidad['nombre'];
        return $query->where('id_modelo', $id)
        ->where('bandera','C')
        ->where('nombre',$nombre);
    }
    // public function scopeTotales($query,$manufacturas){
    //     foreach ($manufacturas as $key => $manufactura) {
    //         $maq=$manufactura->total($manufactura->id)->get();
    //         $x=0;
    //         foreach ($maq as $k => $m) {
    //            $m->cantidad= is_numeric($m->cantidad)?$m->cantidad:0;
    //             // Log::debug($m->cantidad);
    //             $x=$x+$m->cantidad;
    //         }
    //         $manufacturas[$key]->total=$x;
    //     }
    //     // return $x;

    // }

}
