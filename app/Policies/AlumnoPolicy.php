<?php

namespace App\Policies;

use App\Models\User;
use App\Models\alumnos;
use Illuminate\Support\Facades\Log;

use Illuminate\Auth\Access\HandlesAuthorization;

class AlumnoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\alumnos  $alumnos
     * @return mixed
     */
    public function view(User $user, alumnos $alumnos)
    {
        //
        Log::debug('Read policy');
        $team=$user->currentTeam;
        $arr_per=$user->teamPermissions($team);
        return in_array('read',$arr_per,true);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        $team=$user->currentTeam;
        $arr_per=$user->teamPermissions($team);
        return in_array('create',$arr_per,true);

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\alumnos  $alumnos
     * @return mixed
     */
    public function update(User $user, alumnos $alumnos)
    {
        //
        // Log::debug('Update policy->');
        $team=$user->currentTeam;
        $arr_perm=$user->teamPermissions($team);
        // Log::debug($arr_perm);

        // Log::debug(in_array('update',$arr_perm));
        // if(in_array('updated',$arr_perm,true)  ){
        //     Log::debug('Entre a verdadero');
        //     return true;
            
        // }else{
        //     Log::debug('Entre a false');
        //     return false;
        // }
        // return array_search('update',$arr_perm);
         return in_array('update',$arr_perm);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\alumnos  $alumnos
     * @return mixed
     */
    public function delete(User $user, alumnos $alumnos)
    {
        //Log::debug('Policy Delete');
        $team=$user->currentTeam;
        $arr_perm=$user->teamPermissions($team);
        return in_array('delete',$arr_perm,true);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\alumnos  $alumnos
     * @return mixed
     */
    public function restore(User $user, alumnos $alumnos)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\alumnos  $alumnos
     * @return mixed
     */
    public function forceDelete(User $user, alumnos $alumnos)
    {
        //
    }
}
