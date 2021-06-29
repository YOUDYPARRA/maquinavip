<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nombre;
use Inertia\Inertia;

class NombreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nombres=[];
        $nombres=Nombre::where('id','>','0')->orderBy('id','desc')->get();
        return Inertia::render('Nombres',['nombres'=>$nombres]);
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
            'nombre'=>'required | min:2',
            ]);
            Nombre::create([
                'nombre'=>$request->nombre
                ]);
        $nombres=Nombre::where('id','>','0')->orderBy('id','desc')->get();
        return Inertia::render('Nombres',['nombres'=>$nombres]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nombre $nombre)
    {
        //
        $request->validate([
            'nombre'=>'required | min:2',
            ]);
            $nombre->nombre=$request->nombre;
            $nombre->save();
            return redirect()->back()->with('message', 'Actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nombre $nombre)
    {
        $nombre->delete();
        return redirect()->back()->with('message', 'Eliminado');

    }
}
