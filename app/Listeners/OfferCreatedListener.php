<?php

namespace App\Listeners;

use App\Events\OfferCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        //
    }
}
