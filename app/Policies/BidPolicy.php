<?php

namespace App\Policies;

use App\User;
use App\Models\Bid;
use Illuminate\Auth\Access\HandlesAuthorization;

class BidPolicy
{
    use HandlesAuthorization;

    /*public function before($user, $ability)
    {
        return $user->isManager();
    }*/

    /**
     * Determine whether the user can view the bid.
     *
     * @param  \App\User  $user
     * @param  \App\Bid  $bid
     * @return mixed
     */
    public function view(User $user, Bid $bid)
    {
        //
    }

    /**
     * Determine whether the user can create bids.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the bid.
     *
     * @param  \App\User  $user
     * @param  \App\Bid  $bid
     * @return mixed
     */
    public function update(User $user, Bid $bid)
    {
        return $user->id == $bid->user_id && $bid->status == Offer::STATUS_CREATED;
    }

    /**
     * Determine whether the user can delete the bid.
     *
     * @param  \App\User  $user
     * @param  \App\Bid  $bid
     * @return mixed
     */
    public function delete(User $user, Bid $bid)
    {
        dd($bid);
        return $user->id == $bid->user_id && $bid->status == Offer::STATUS_CREATED;
    }
}
