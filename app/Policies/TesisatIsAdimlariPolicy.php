<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TesisatIsAdimlari;
use Illuminate\Auth\Access\HandlesAuthorization;

class TesisatIsAdimlariPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the tesisatIsAdimlari can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list tesisatisadimlaris');
    }

    /**
     * Determine whether the tesisatIsAdimlari can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TesisatIsAdimlari  $model
     * @return mixed
     */
    public function view(User $user, TesisatIsAdimlari $model)
    {
        return $user->hasPermissionTo('view tesisatisadimlaris');
    }

    /**
     * Determine whether the tesisatIsAdimlari can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create tesisatisadimlaris');
    }

    /**
     * Determine whether the tesisatIsAdimlari can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TesisatIsAdimlari  $model
     * @return mixed
     */
    public function update(User $user, TesisatIsAdimlari $model)
    {
        return $user->hasPermissionTo('update tesisatisadimlaris');
    }

    /**
     * Determine whether the tesisatIsAdimlari can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TesisatIsAdimlari  $model
     * @return mixed
     */
    public function delete(User $user, TesisatIsAdimlari $model)
    {
        return $user->hasPermissionTo('delete tesisatisadimlaris');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TesisatIsAdimlari  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete tesisatisadimlaris');
    }

    /**
     * Determine whether the tesisatIsAdimlari can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TesisatIsAdimlari  $model
     * @return mixed
     */
    public function restore(User $user, TesisatIsAdimlari $model)
    {
        return false;
    }

    /**
     * Determine whether the tesisatIsAdimlari can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TesisatIsAdimlari  $model
     * @return mixed
     */
    public function forceDelete(User $user, TesisatIsAdimlari $model)
    {
        return false;
    }
}
