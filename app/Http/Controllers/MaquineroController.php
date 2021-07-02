<?php

namespace App\Http\Controllers;

use App\Models\Maquinero;
use App\Models\Nombre;
use Illuminate\Http\Request;
use Inertia\Inertia;

use Illuminate\Support\Facades\Log;

class MaquineroController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $r)
    {
        //
        // $this->tallas();
        $id_modelo=$r->manufactura['id'];
        $maquileros=[];
        $nombres=[];
        $maquileros=Maquinero::
        where('id_modelo',$id_modelo)
        ->orderBy('id','desc')
        ->get();
        $total=$this->total_modelo($maquileros);
        
        $nombres=Nombre::where('id','>','0')->orderBy('id','desc')->get();
        return Inertia::render('Maquileros',[
            'nombres'=>$nombres,
            'maquileros'=>$maquileros,
            'total'=>$total,
            'modelo'=>$r,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->id_nombre);
        
        $request->validate([
            'id_nombre'=>'required',
            'cantidad'=>'required | numeric',
            'talla'=>'required',
            ]);
            Maquinero::create([
                'id_modelo'=>$request->id_modelo,
                'id_nombre'=>$request->id_nombre,
                'nombre'=>$this->nombre_maquilero($request->id_nombre),
                'talla'=>$request->talla,
                'cantidad'=>$request->cantidad,
                'hilo_recta'=>$request->hilo_recta,
                'hilo_over'=>$request->hilo_over,
                'tipo'=>$request->tipo,
                'observacion'=>$request->observacion
            ]);
            return redirect()->back()->with('message', 'Creado');
    }

    /**
     * Selecciona el maquilero, y ordena por tallas y suma las tallas y suma por maquinero
     *
     * @param  \App\Models\Maquinero  $maquinero
     * @return \Illuminate\Http\Response
     */
    public function show(Maquinero $maquinero, Request $request)
    {
        // dd($request->all());
        $id_nombre=$request['maquilero']['id_nombre'];
        $totales= array();
        foreach ($this->tallas() as $key => $talla) {
            $total_talla=[];
            $detalle_talla=Maquinero::where('id_nombre',$id_nombre)
            ->where('talla',$talla)
            ->get();
            $suma_talla=0;
            $total_talla[]=$talla;
            
            foreach ($detalle_talla as $key => $suma) {
                $suma_talla=$suma_talla+$suma->cantidad;
            }
            $total_talla[]=$suma_talla;

            // Log::debug($total_talla);
            if(!empty($total_talla)){
                $totales[]=$total_talla;
            }
        }
        return Inertia::render('Maquileros',[
            'totales'=>$totales
            ]);
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maquinero  $maquinero
     * @return \Illuminate\Http\Response
     */
    public function edit(Maquinero $maquinero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maquinero  $maquinero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maquinero $maquinero)
    {
        //
        // dd($request->all());
        $request->validate([
            'nombre'=>'required | min:2',
            'cantidad'=>'required',
            'talla'=>'required',
            ]);
            $maquinero=$maquinero->findOrFail($request->id);
            $maquinero->nombre=$request->nombre;
            $maquinero->id_nombre=$request->id_nombre;
            $maquinero->id_modelo=$request->id_modelo;
            $maquinero->talla=$request->talla;
            $maquinero->cantidad=$request->cantidad;
            $maquinero->hilo_recta=$request->hilo_recta;
            $maquinero->hilo_over=$request->hilo_over;
            $maquinero->tipo=$request->tipo;
            $maquinero->observacion=$request->observacion;
            $maquinero->save();
            return redirect()->back()->with('message', 'Elemento Acutalizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maquinero  $maquinero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maquinero $maquinero, Request $r)
    {
        $maquinero->findOrFail($r->id)->delete();
        return redirect()->back()->with('message', 'Eliminado');
    }
    private function total_modelo($maquileros){
        $cantidad=0;
        foreach ($maquileros as $key => $maquilero) {
            if(is_numeric($maquilero->cantidad)){
                $cantidad=$cantidad+$maquilero->cantidad;
            }
        }
        return $cantidad;        

    }
    private function nombre_maquilero($id_maquilero){
        $maquilero=Nombre::findOrFail($id_maquilero);
        return $maquilero->nombre;
    }
    private function tallas(){
        $talla=[];
        $tallas=Maquinero::groupBy('talla')->get();
        foreach ($tallas as $key => $t) {
            $talla[]=$t->talla;
        }
        return $talla;
    }
}
