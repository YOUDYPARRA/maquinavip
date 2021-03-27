<?php

namespace App\Http\Controllers;

use App\Models\alumnos;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
          $user = Auth::user();
        Log::debug($user->currentTeam);
        //Log::debug($user->team);
         $team=$user->currentTeam;
          //dd($user->teamRole($t));
              dd($user->teamPermissions($team));
            //  dd($user->tokenCan(''));
        

        // Log::debug($user->teamPermissions('Cliente'));
         //Log::debug($user->teamPermissions('Administrator'));
        //Log::debug($user->teamPermissions(3));
        //$this->authorize('create',alumnos::class);
        // if($request->user()->cannot('create',alumnos::class)){
        //     abort(403);
        // }
        $alumnos=alumnos::where('id','>',0)->orderBy('id','desc')->get();
        // if($request->user()->can('view',$alumnos[1])){
        //     abort(403);
        // }
        // dd($alumnos[1]);

        // if($request->user()->can('update',$alumnos[1])){
        //     Log::debug('tengo permiso de update');
        // }
        // else{
        //         abort(403);
        //     }
        return Inertia::render('Alumnos',['alumnos'=>$alumnos]);
        
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
        // Log::debug('FECHA '.$this->formatDate($request->fecha_nacimiento));
        $request->validate([
            'apellido_paterno'=>'required | min:2',
            'nombre'=>'required',
            'apellido_materno'=>'required',
            //'id_grupo'=>'required',
            'fecha_nacimiento'=>'required',
            'equipo'=>'required',
            'observacion'=>'required',
            'correo'=>'required'
        ]);
        alumnos::create([
            'nombre'=>$request->nombre,
            'apellido_paterno'=>$request->apellido_paterno,
            'apellido_materno'=>$request->apellido_materno,
            'id_grupo'=>$request->id_grupo,
            'fecha_nacimiento'=>$request->fecha_nacimiento,
            'equipo'=>$request->equipo,
            'observacion'=>$request->observacion,
            'correo'=>$request->correo,
        ]);
        $alumnos=alumnos::where('id','>',0)->orderBy('id','desc')->get();
        return Inertia::render('Alumnos',['alumnos'=>$alumnos]);
        

    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\s  $s
     * @return \Illuminate\Http\Response
     */
    public function show(alumnos $s)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\s  $s
     * @return \Illuminate\Http\Response
     */
    public function edit(alumnos $s)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\s  $s
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, alumnos $alumno)
    {
        Log::debug($request->all());
        $request->validate([
            'apellido_paterno'=>'required | min:2',
            'nombre'=>'required | min:2',
            'apellido_materno'=>'required',
            //'id_grupo'=>'required',
            'fecha_nacimiento'=>'required',
            'equipo'=>'required',
            'observacion'=>'required',
            'correo'=>'required'
        ]);
         Log::debug('alumno '.$alumno);
        $alumno->apellido_paterno=$request->apellido_paterno;
        $alumno->nombre=$request->nombre;
        $alumno->apellido_materno=$request->apellido_materno;
        $alumno->id_grupo=$request->id_grupo;
        $alumno->fecha_nacimiento=$request->fecha_nacimiento;
        $alumno->equipo=$request->equipo;
        $alumno->observacion=$request->observacion;
        $alumno->correo=$request->correo;
        $alumno->save();
        return redirect()->back()->with('success_message', 'Yay it worked');
        //return Inertia::render('Alumnos',['alumnos'=>alumnos::where('id','>',0)->orderBy('id','desc')->get()]);//->with('message', 'Post Updated Successfully.');;
        
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\s  $s
     * @return \Illuminate\Http\Response
     */
    public function destroy(alumnos $alumno)
    {
        $alumno->delete();
        return redirect()->back()->with('message', 'Elemento eliminado');
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
