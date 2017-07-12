<?php

namespace App\Listeners;

use App\Events\OfferExpired;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\YourOfferHasNotSuccess;

class OfferExpiredListener
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
     * @param  OfferExpired  $event
     * @return void
     */
    public function handle(OfferExpired $event)
    {
        $offer = $event->offer;
        $vehicle = $offer->vehicle;
        $manager = $vehicle->fund->user;
        $user = $offer->user;

        $manager->notify(new YourOfferHasNotSuccess($offer));
        $user->notify(new YourOfferHasNotSuccess($offer));
    }
}
