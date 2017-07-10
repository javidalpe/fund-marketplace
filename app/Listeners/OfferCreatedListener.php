<?php

namespace App\Listeners;

use App\Events\OfferCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\OfferAvailable;

class OfferCreatedListener
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
     * @param  OfferCreated  $event
     * @return void
     */
    public function handle(OfferCreated $event)
    {
        $offer = $event->offer;
        $vehicle = $offer->vehicle;
        $manager = $vehicle->fund->user;

        $manager->notify(new OfferAvailable($offer));

        $investorsWithoutPublisher = $vehicle->investors()->where('id', '!=', $offer->user_id)->get();
        foreach ($investorsWithoutPublisher as $key => $investor) {
            $investor->notify(new OfferAvailable($offer));
        }

    }
}
