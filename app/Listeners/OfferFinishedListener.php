<?php

namespace App\Listeners;

use App\Events\OfferFinished;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OfferFinishedListener
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
     * @param  OfferFinished  $event
     * @return void
     */
    public function handle(OfferFinished $event)
    {
        //
    }
}
