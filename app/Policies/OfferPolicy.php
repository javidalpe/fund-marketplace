<?php

namespace App\Policies;

use App\User;
use App\Offer;
use Illuminate\Auth\Access\HandlesAuthorization;

class OfferPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the offer.
     *
     * @param  \App\User  $user
     * @param  \App\Offer  $offer
     * @return mixed
     */
    public function view(User $user, Offer $offer)
    {
        //
    }

    /**
     * Determine whether the user can create offers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the offer.
     *
     * @param  \App\User  $user
     * @param  \App\Offer  $offer
     * @return mixed
     */
    public function update(User $user, Offer $offer)
    {
        //
    }

    /**
     * Determine whether the user can delete the offer.
     *
     * @param  \App\User  $user
     * @param  \App\Offer  $offer
     * @return mixed
     */
    public function delete(User $user, Offer $offer)
    {
        //
    }
}
