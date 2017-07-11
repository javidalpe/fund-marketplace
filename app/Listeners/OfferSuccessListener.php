<?php

namespace App\Listeners;

use App\Events\OfferSuccess;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        //
    }
}
