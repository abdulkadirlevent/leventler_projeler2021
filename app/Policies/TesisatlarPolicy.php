<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Tesisatlar;
use Illuminate\Auth\Access\HandlesAuthorization;

class TesisatlarPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the tesisatlar can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list tesisatlars');
    }

    /**
     * Determine whether the tesisatlar can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Tesisatlar  $model
     * @return mixed
     */
    public function view(User $user, Tesisatlar $model)
    {
        return $user->hasPermissionTo('view tesisatlars');
    }

    /**
     * Determine whether the tesisatlar can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create tesisatlars');
    }

    /**
     * Determine whether the tesisatlar can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Tesisatlar  $model
     * @return mixed
     */
    public function update(User $user, Tesisatlar $model)
    {
        return $user->hasPermissionTo('update tesisatlars');
    }

    /**
     * Determine whether the tesisatlar can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Tesisatlar  $model
     * @return mixed
     */
    public function delete(User $user, Tesisatlar $model)
    {
        return $user->hasPermissionTo('delete tesisatlars');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Tesisatlar  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete tesisatlars');
    }

    /**
     * Determine whether the tesisatlar can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Tesisatlar  $model
     * @return mixed
     */
    public function restore(User $user, Tesisatlar $model)
    {
        return false;
    }

    /**
     * Determine whether the tesisatlar can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Tesisatlar  $model
     * @return mixed
     */
    public function forceDelete(User $user, Tesisatlar $model)
    {
        return false;
    }
}
