<?php

namespace App\Listeners;

use App\Events\OfferUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OfferUpdatedListener
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
     * @param  OfferUpdated  $event
     * @return void
     */
    public function handle(OfferUpdated $event)
    {
        //
    }
}
