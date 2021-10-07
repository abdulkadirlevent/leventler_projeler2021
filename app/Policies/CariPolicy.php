<?php

namespace App\Policies;

use App\Models\Cari;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CariPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the cari can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list caris');
    }

    /**
     * Determine whether the cari can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Cari  $model
     * @return mixed
     */
    public function view(User $user, Cari $model)
    {
        return $user->hasPermissionTo('view caris');
    }

    /**
     * Determine whether the cari can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create caris');
    }

    /**
     * Determine whether the cari can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Cari  $model
     * @return mixed
     */
    public function update(User $user, Cari $model)
    {
        return $user->hasPermissionTo('update caris');
    }

    /**
     * Determine whether the cari can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Cari  $model
     * @return mixed
     */
    public function delete(User $user, Cari $model)
    {
        return $user->hasPermissionTo('delete caris');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Cari  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete caris');
    }

    /**
     * Determine whether the cari can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Cari  $model
     * @return mixed
     */
    public function restore(User $user, Cari $model)
    {
        return false;
    }

    /**
     * Determine whether the cari can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Cari  $model
     * @return mixed
     */
    public function forceDelete(User $user, Cari $model)
    {
        return false;
    }
}
