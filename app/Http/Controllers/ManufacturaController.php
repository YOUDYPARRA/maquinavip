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
        $manufacturas=Manufactura::where('id','>','0')->orderBy('id','desc')->get();
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
        //
        // Log::debug('Manufacturas');
        // Log::debug($request->imagen);
        if ($request->bandera=='M') {
            $request->validate([
                'nombre'=>'required | min:2',
                 
                'bandera'=>'required',
            ]);
        } else if($request->bandera=='C'){
            # code...
            $request->validate([
                'nombre'=>'required | min:2',
                'id_modelo'=>'required | min:2',
                'modelo'=>'required | min:2',
                'cantidad'=>'required | min:2',
                'bandera'=>'required | min:2',
            ]);
        }
        // Log::debug($request->imagen->getClientOriginalName());
        if(!empty($request->imagen)){
            $nombre_imagen=$request->imagen->getClientOriginalName();
            $path = $request->file('imagen')->store('public');
             $archivo=explode('/',$path);

        }
        // $contents = file_get_contents($request->imagen->path());
        //Storage::disk('local')->put($request->imagen, 'Contents');
        //Log::debug($url = Storage::url($request->imagen));
        //$file_name = time().'_'.$request->imagen->getClientOriginalName();
                //$file_path = $request->imagen('imagen')->storeAs('uploads', $file_name, 'public');
                //Log::debug($file_path);
                //$url = Storage::url($path);
                // Log::debug($);
Log::debug('observacion '.$request->observacion);
        $observacion=empty($request->observacion) ? '' : $request->observacion;

Log::debug($observacion);
        Manufactura::create([
            'nombre'=>$request->nombre,
            'imagen'=>$archivo[1],
            'id_modelo'=>'',
            'cantidad'=>'',
            'bandera'=>$request->bandera,
            'observacion'=> $observacion
        ]);

        $manufacturas=Manufactura::where('id','>','0')->orderBy('id','desc')->get();
        // Log::debug($manufacturas);
        return Inertia::render('Manufacturas',['manufacturas'=>$manufacturas]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manufactura  $manufactura
     * @return \Illuminate\Http\Response
     */
    public function show(Manufactura $manufactura)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manufactura  $manufactura
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufactura $manufactura)
    {
        //
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
        //
        $request->validate([
            'nombre'=>'required | min:2',
            'bandera'=>'required',
            'imagen'=>'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048',
            //'id_modelo'=>'required | min:2',
            // 'imagen'=>'required',
            // 'cantidad'=>'required | min:2',
        ]);

        $manufactura->nombre=$request->nombre;
        //$manufactura->id_modelo=$request->id_modelo;
        // $manufactura->modelo=$request->modelo;
        // $manufactura->cantidad=$request->cantidad;
        $manufactura->imagen=$request->imagen;
        $manufactura->save();
        return redirect()->back()->with('success_message', 'Guardado');

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
