<?php

namespace App\Listeners;

use App\Events\OfferDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OfferDeletedListener
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
     * @param  OfferDeleted  $event
     * @return void
     */
    public function handle(OfferDeleted $event)
    {
        //
    }
}
