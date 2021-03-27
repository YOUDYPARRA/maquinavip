<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Illuminate\Support\Facades\Log;

use App\Models\alumnos;
class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {   
        return array_merge(parent::share($request), [
            'permision_alumno'=>[
                'update' => fn () => $request->user()
                ? $this->getPermisinAlumno($request,'update')
                : null,
                'create' => fn () => $request->user()
                ? $this->getPermisinAlumno($request,'create')
                : null,
                'delete'=>fn()=>$request->user()
                ? $this->getPermisinAlumno($request,'delete')
                :null,
                'view'=>fn()=>$request->user()
                ?$this->getPermisinAlumno($request,'view')
                :null
                ]
            //
            ]);
        }
    private function getPermisinAlumno($request,$permiso){
        $alumno=alumnos::where('id','>','0')->first();
        switch ($permiso) {
            case 'create':
                return $request->user()->can($permiso,alumnos::class);
                break;
                default:
                Log::debug('switch updat');
                return $request->user()->can($permiso,$alumno);
                break;
        }
    }
}
