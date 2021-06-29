<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Nombre;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {
        //
        // dd($r['maquilero']['id_nombre']);
        $pagos=Pago::where('id_nombre',$r['maquilero']['id_nombre'])
        ->orderBy('id','desc')->get();
        return Inertia::render('Pagos',['pagos'=>$pagos,
        'nombre'=>$this->nombre_maquilero($r['maquilero']['id_nombre']),
        'id_nombre'=>$r['maquilero']['id_nombre']
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
        $request->validate([
            'id_nombre'=>'required',
            'monto'=>'required',
            'observacion'=>'required',
            ]);
            Pago::create([
                'id_nombre'=>$request->id_nombre,
                'monto'=>$request->monto,
                'nombre'=>'',
                'observacion'=>$request->observacion]);
                dd($request->observacion);
                return redirect()->back()->with('message', 'Creado');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show(Pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pago $pago, Request $r)
    {
        //
        // dd($pago);
        $pago->findOrFail($r->id)->delete();
        return redirect()->back()->with('message', 'Eliminado');
    }
    private function nombre_maquilero($id_maquilero)
    {
        $nombre=Nombre::findOrFail($id_maquilero);
        return $nombre->nombre;
    }
}
