<?php

namespace App\Listeners;

use App\Events\OfferSuccess;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\YourOfferHasBeenCompleted;
use App\Notifications\HandleOfferCompleted;

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

        $manager->notify(new HandleOfferCompleted($offer));
        $user->notify(new YourOfferHasBeenCompleted($offer));
    }
}
