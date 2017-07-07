<?php

namespace App\Policies;

use App\User;
use App\Fund;
use Illuminate\Auth\Access\HandlesAuthorization;

class FundPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        return $user->isManager();
    }

    /**
     * Determine whether the user can view the fund.
     *
     * @param  \App\User  $user
     * @param  \App\Fund  $fund
     * @return mixed
     */
    public function view(User $user, Fund $fund)
    {
        //
    }

    /**
     * Determine whether the user can create funds.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isManager();
    }

    /**
     * Determine whether the user can update the fund.
     *
     * @param  \App\User  $user
     * @param  \App\Fund  $fund
     * @return mixed
     */
    public function update(User $user, Fund $fund)
    {
        //
    }

    /**
     * Determine whether the user can delete the fund.
     *
     * @param  \App\User  $user
     * @param  \App\Fund  $fund
     * @return mixed
     */
    public function delete(User $user, Fund $fund)
    {
        //
    }
}
