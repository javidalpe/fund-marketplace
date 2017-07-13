<?php

namespace App\Policies;

use App\User;
use App\Models\Vehicle;
use Illuminate\Auth\Access\HandlesAuthorization;

class VehiclePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the vehicle.
     *
     * @param  \App\User  $user
     * @param  \App\Vehicle  $vehicle
     * @return mixed
     */
    public function view(User $user, Vehicle $vehicle)
    {
        //
    }

    /**
     * Determine whether the user can create vehicles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isManager();
    }

    /**
     * Determine whether the user can update the vehicle.
     *
     * @param  \App\User  $user
     * @param  \App\Vehicle  $vehicle
     * @return mixed
     */
    public function update(User $user, Vehicle $vehicle)
    {
        return $user->isManager();
    }

    /**
     * Determine whether the user can delete the vehicle.
     *
     * @param  \App\User  $user
     * @param  \App\Vehicle  $vehicle
     * @return mixed
     */
    public function delete(User $user, Vehicle $vehicle)
    {
        return $user->isManager();
    }

    public function offer(User $user, Vehicle $vehicle)
    {
        if ($user->isManager()) return true;
        
        $stock_amount = $vehicle->operations()->where('user_id', $user->id)->sum('amount');
        return $stock_amount > 0;
    }
}
