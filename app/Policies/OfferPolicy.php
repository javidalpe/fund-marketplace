<?php

namespace App\Policies;

use App\User;
use App\Models\Offer;
use Carbon\Carbon;
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
        return $user->isManager() || $user->id == $offer->user_id;
    }

    /**
     * Determine whether the user can create offers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isManager() || $user->companies()->count() > 0;
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
        return $user->isManager() || ($user->id == $offer->user_id && $offer->status == Offer::STATUS_VEHICLE_PHASE);
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
        return $user->isManager() || ($user->id == $offer->user_id && $offer->status == Offer::STATUS_VEHICLE_PHASE);
    }

    public function bid(User $user, Offer $offer)
    {
        if (!$offer->status == Offer::STATUS_VEHICLE_PHASE && !$offer->status == Offer::STATUS_CLUB_PHASE) return false;

        if ($user->isManager()) return true;

        if ($user->id == $offer->user_id) return false;

        if ($user->bids()->where('offer_id', $offer->id)->first()) return false;

        $isVehicleMate = $user->companies()->find($offer->vehicle_id);
        $isAvailableForClubs = $offer->status == Offer::STATUS_CLUB_PHASE;
        $isSameClub = $user->clubs()->find($offer->vehicle->fund->id);

        return $isVehicleMate || ($isSameClub && $isAvailableForClubs);
    }
}
