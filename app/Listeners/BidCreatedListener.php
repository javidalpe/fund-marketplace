<?php

namespace App\Listeners;

use App\Events\BidCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\BidPublished;

class BidCreatedListener
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
     * @param  BidCreated  $event
     * @return void
     */
    public function handle(BidCreated $event)
    {
        $bid = $event->bid;

        $offer = $bid->offer;
        $vehicle = $offer->vehicle;
        $fund = $vehicle->fund;
        $manager = $fund->user;

        $bid->user->notify(new BidPublished($bid));
        $manager->notify(new BidPublished($bid));
    }
}
