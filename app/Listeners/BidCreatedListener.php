<?php

namespace App\Listeners;

use App\Events\BidCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        //
    }
}
