<?php

namespace App\Policies;

use App\User;
use App\Operation;
use Illuminate\Auth\Access\HandlesAuthorization;

class OperationPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        return $user->isManager();
    }

    /**
     * Determine whether the user can view the operation.
     *
     * @param  \App\User  $user
     * @param  \App\Operation  $operation
     * @return mixed
     */
    public function view(User $user, Operation $operation)
    {
        //
    }

    /**
     * Determine whether the user can create operations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the operation.
     *
     * @param  \App\User  $user
     * @param  \App\Operation  $operation
     * @return mixed
     */
    public function update(User $user, Operation $operation)
    {
        //
    }

    /**
     * Determine whether the user can delete the operation.
     *
     * @param  \App\User  $user
     * @param  \App\Operation  $operation
     * @return mixed
     */
    public function delete(User $user, Operation $operation)
    {
        //
    }
}
