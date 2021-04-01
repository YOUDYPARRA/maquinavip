<?php

namespace App\Http\Controllers;

use App\Models\Manufactura;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class ManufacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $manufacturas=Manufactura::where('id','>','0')->where('bandera','M')->orderBy('id','desc')->get();
        return Inertia::render('Manufacturas',['manufacturas'=>$manufacturas]);
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
        $request->validate([
            'modelo'=>'required | min:2',
            'bandera'=>'required',
            ]);
            $archivo='';
            Log::debug('Manufacturas');
            if(!empty($request->imagen)){
                $nombre_imagen=$request->imagen->getClientOriginalName();
                $path = $request->file('imagen')->store('public');
                $archivo=explode('/',$path);
            }
            Log::debug('observacion '.$request->observacion);
            // dd($request);
        $archivo=empty($archivo) ? '' : $archivo[1];
        $observacion=empty($request->observacion) ? '' : $request->observacion;

Log::debug($observacion);
        Manufactura::create([
            'modelo'=>$request->modelo,
            'imagen'=>$archivo,
            'id_modelo'=>'',
            'cantidad'=>'',
            'bandera'=>$request->bandera,
            'observacion'=> $observacion
        ]);

        $manufacturas=Manufactura::where('id','>','0')->where('bandera','M')->orderBy('id','desc')->get();
        // Log::debug($manufacturas);
        return Inertia::render('Manufacturas',['manufacturas'=>$manufacturas]);
        
    }

    /**
     * Display list count
     *manufacturas/{objeto}
     * @param  \App\Models\Manufactura  $manufactura
     * @return \Illuminate\Http\Response
     * GET url/data
     */
    public function show(Manufactura $manufactura)
    {
        //
        // Log::debug('Show');
        // Log::debug($manufactura);
        $conteos= Manufactura::where('id_modelo',$manufactura->id)
        ->where('bandera','C')->orderBy('id','desc')->get();
        Log::debug($conteos);
        return Inertia::render('Manufacturas',['manufacturas'=>Manufactura::where('id','>','0')->where('bandera','M')->orderBy('id','desc')->get(),'conteos'=>$conteos]);
    }

    /**
     * Consulta un modelo y lo usa para almacenar la relacion de persona realiza
     *GET manufacturas/{objeto}/edit
     * @param  \App\Models\Manufactura  $manufactura
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Manufactura $manufactura)
    {
        //
        Log::debug($request);
        Log::debug($manufactura);
        $request->validate([
            'modelo'=>'required | min:2',
            'id_modelo'=>'required | min:2',
            'bandera'=>'required',
            'nombre'=>'required',
            'cantidad'=>'required',
            ]);
            Manufactura::create([
                'modelo'=>$request->modelo,
                'id_modelo'=>$request->id_modelo,
                'bandera'=>$request->bandera,
                'cantidad'=>$request->cantidad,
                'nombre' => $request->nombre,
                'observacion'=> $request->observacion
            ]);
            // return redirect()->back()->with('message', 'Actualizado');
            $conteos= Manufactura::where('id_modelo',$manufactura->id)
        ->where('bandera','C')->orderBy('id','desc')->get();
            return Inertia::render('Manufacturas',['manufacturas'=>Manufactura::where('id','>','0')->where('bandera','M')->orderBy('id','desc')->get(),'conteos'=>$conteos]);
            
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manufactura  $manufactura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manufactura $manufactura)
    {
        Log::debug($request->observacion);
        Log::debug($manufactura);
        $request->validate([
            'modelo'=>'required | min:2',
            'bandera'=>'required',
            // 'imagen'=>'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048',
            ]);
            
            $manufactura->modelo=$request->modelo;
            // $manufactura->imagen=$request->imagen;
            $manufactura->observacion=$request->observacion;
            Log::debug($manufactura->observacion);
        $manufactura->save();
        //$manufactura->id_modelo=$request->id_modelo;
        // $manufactura->modelo=$request->modelo;
        // $manufactura->cantidad=$request->cantidad;
        return redirect()->back()->with('message', 'Actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manufactura  $manufactura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufactura $manufactura)
    {
        //
        $manufactura->delete();

        return redirect()->back()->with('message', 'Eliminado');
    }
    private function formatDate($date){
        //$date=str_replace($date,"/","-"); Devuelve dd/mm/aaaa
        if(empty($date)){
            return;
        }
        $arr=explode('-',$date);
        if(count($arr)){
            Log::debug($arr);
            $subarr=explode(' ',$arr[2]);
            return $subarr[0].'/'.$arr[1].'/'.$arr[0];
        }else{
            $arr=explode('/',$date);
            return $subarr[0].'/'.$arr[1].'/'.$arr[0];

        }
      }
}
