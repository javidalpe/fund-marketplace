<?php

namespace App\Listeners;

use App\Events\OfferSuccess;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\OfferHasBeenCompleted;

class OfferSuccessListener
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
     * @param  OfferSuccess  $event
     * @return void
     */
    public function handle(OfferSuccess $event)
    {
        $offer = $event->offer;
        $vehicle = $offer->vehicle;
        $manager = $vehicle->fund->user;
        $user = $offer->user;

        $manager->notify(new OfferHasBeenCompleted($offer));
        $user->notify(new OfferHasBeenCompleted($offer));
    }
}
