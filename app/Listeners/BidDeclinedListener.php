<?php

namespace App\Listeners;

use App\Events\BidDeclined;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class BidDeclinedListener
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
     * @param  BidDeclined  $event
     * @return void
     */
    public function handle(BidDeclined $event)
    {
        //
    }
}
