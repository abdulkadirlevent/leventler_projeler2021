<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Projeler;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjelerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the projeler can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list projelers');
    }

    /**
     * Determine whether the projeler can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Projeler  $model
     * @return mixed
     */
    public function view(User $user, Projeler $model)
    {
        return $user->hasPermissionTo('view projelers');
    }

    /**
     * Determine whether the projeler can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create projelers');
    }

    /**
     * Determine whether the projeler can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Projeler  $model
     * @return mixed
     */
    public function update(User $user, Projeler $model)
    {
        return $user->hasPermissionTo('update projelers');
    }

    /**
     * Determine whether the projeler can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Projeler  $model
     * @return mixed
     */
    public function delete(User $user, Projeler $model)
    {
        return $user->hasPermissionTo('delete projelers');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Projeler  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete projelers');
    }

    /**
     * Determine whether the projeler can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Projeler  $model
     * @return mixed
     */
    public function restore(User $user, Projeler $model)
    {
        return false;
    }

    /**
     * Determine whether the projeler can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Projeler  $model
     * @return mixed
     */
    public function forceDelete(User $user, Projeler $model)
    {
        return false;
    }
}
