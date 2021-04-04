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
use Illuminate\Support\Facades\DB;
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
        $manufactur=Manufactura::where('id','>','0')->where('bandera','M')->orderBy('id','desc')->get();
        if(count($manufactur)>0){

            $manufacturas=$this->total_es(Manufactura::class,$manufactur);
        }

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
            'observacion'=> $observacion,
            'color'=> $request->color
        ]);
        $manufacturas=$this->total_es(Manufactura::where('id','>','0')->where('bandera','M')->orderBy('id','desc')->get());
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
        Log::debug('Show');
        // Log::debug($manufactura);
        $conteos= Manufactura::where('id_modelo',$manufactura->id)
        ->where('bandera','C')->orderBy('id','desc')->get();
        $manufacturas=$this->total_es(Manufactura::class,Manufactura::where('id','>','0')->where('bandera','M')->orderBy('id','desc')->get());
        $nombres = DB::table('manufacturas')->select('nombre')->distinct()->where('bandera','C')->where('id_modelo',$manufactura->id)->get();
        Log::debug($nombres);
        foreach ($nombres as $key => $nombre) {
            $arr_busc=['id'=>$manufactura->id,'nombre'=>$nombre->nombre];
            $total=$this->cada_manufactura($arr_busc,Manufactura::class);
            foreach ($conteos as $k => $conteo) {
                Log::debug($conteo->nombre);
                if($conteo->nombre==$nombre->nombre){
                    Log::debug($total);
                    if(!isset($conteo->total)){
                        $conteos[$k]->total=$total;
                        Log::debug('->'.$conteos[$k]->total);
                    }
                }
            }

        }
        return Inertia::render('Manufacturas',['manufacturas'=>$manufacturas,'conteos'=>$conteos]);
    }

    /**
     * Consulta un modelo y lo usa para almacenar la relacion de persona realiza
     *GET manufacturas/{objeto}/edit
     * @param  \App\Models\Manufactura  $manufactura$
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Manufactura $manufactura)
    {
        //
        // Log::debug($request);
        // Log::debug($manufactura);
        Log::debug('EDIT');
        $request->validate([
            'modelo'=>'required | min:2',
            'id_modelo'=>'required',
            'bandera'=>'required',
            'nombre'=>'required | min:2',
            'cantidad'=>'required',
            'talla'=>'required',
            ]);
            Manufactura::create([
                'modelo'=>$request->modelo,
                'id_modelo'=>$request->id_modelo,
                'bandera'=>$request->bandera,
                'cantidad'=>$request->cantidad,
                'nombre' => $request->nombre,
                'talla'=> $request->talla,
                'observacion'=> $request->observacion
            ]);
            // return redirect()->back()->with('message', 'Actualizado');
            $conteos= Manufactura::where('id_modelo',$manufactura->id)
        ->where('bandera','C')->orderBy('id','desc')->get();

            $manufacturas=$this->total_es(Manufactura::class,Manufactura::where('id','>','0')->where('bandera','M')->orderBy('id','desc')->get());
            $nombres = DB::table('manufacturas')->select('nombre')->distinct()->where('bandera','C')->where('id_modelo',$manufactura->id)->get();
            Log::debug($nombres);
            foreach ($nombres as $key => $nombre) {
                $arr_busc=['id'=>$manufactura->id,'nombre'=>$nombre->nombre];
                $total=$this->cada_manufactura($arr_busc,Manufactura::class);
                foreach ($conteos as $k => $conteo) {
                    Log::debug($conteo->nombre);
                    if($conteo->nombre==$nombre->nombre){
                        Log::debug($total);
                        if(!isset($conteo->total)){
                            $conteos[$k]->total=$total;
                            Log::debug('->'.$conteos[$k]->total);
                        }
                    }
                }
    
            }
            return Inertia::render('Manufacturas',['manufacturas'=>$manufacturas,'conteos'=>$conteos]);
            
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
        Log::debug('IPDATE');
        $request->validate([
            'modelo'=>'required | min:2',
            'bandera'=>'required',
            // 'imagen'=>'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048',
            ]);
            $manufactura->modelo=$request->modelo;
            // $manufactura->imagen=$request->imagen;
            $manufactura->observacion=$request->observacion;
            $manufactura->color=$request->color;
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
      private function total_es ($maquila,$manufacturas){
        foreach ($manufacturas as $key => $manufactura) {
            // Log::debug($manufactura->id);
            $maq=$maquila::cantidades($manufactura->id)->get();
            $x=0;
            // Log::debug($maq);
            foreach ($maq as $k => $m) {
                // Log::debug($m);
               $m->cantidad= is_numeric($m->cantidad)?$m->cantidad:0;
                // Log::debug($m->cantidad);
                $x=$x+$m->cantidad;
            }
            $manufacturas[$key]->total=$x;
        }
        return $manufacturas;


      }
      private function cada_manufactura(Array $manufactura,$manufactura_clase){
          //obtener la cantidad por cada nombre con bandera C
          //manufactura[id=>,nombre=>]
          # code...
          Log::debug($manufactura);
          $t=0;
          $contar=$manufactura_clase::totalmaquinero([
              'id'=>$manufactura['id'],
              'nombre'=>$manufactura['nombre']
              ])->get();
              Log::debug($contar);
              foreach ($contar as $key => $c) {
                  # code...

                  $c->cantidad= is_numeric($c->cantidad)?$c->cantidad:0;
                  Log::debug($c->cantidad);
                  $t=$t+$c->cantidad;
              }
        return $t;
      }
}