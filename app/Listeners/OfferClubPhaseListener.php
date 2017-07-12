<?php

namespace App\Listeners;

use App\Events\OfferClubPhase;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\OfferAvailable;

class OfferClubPhaseListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OfferClubPhase  $event
     * @return void
     */
    public function handle(OfferClubPhase $event)
    {
        $offer = $event->offer;
        $vehicle = $offer->vehicle;
        $fund = $vehicle->fund;
        $vehicleInvestors = $vehicle->investors()->where('id', '!=', $offer->user_id)->get();

        $investors = $fund->users()->whereNotIn('users.id', array_pluck($vehicleInvestors, 'id'))->get();

        foreach ($investors as $key => $investor) {
            $investor->notify(new OfferAvailable($offer));
        }
    }
}
