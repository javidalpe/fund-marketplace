<?php

namespace App\Listeners;

use App\Events\BidDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class BidDeletedListener
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
     * @param  BidDeleted  $event
     * @return void
     */
    public function handle(BidDeleted $event)
    {
        //
    }
}
