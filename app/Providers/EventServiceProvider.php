<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\OfferCreated' => [
            'App\Listeners\OfferCreatedListener',
        ],
        'App\Events\OfferUpdated' => [
            'App\Listeners\OfferUpdatedListener',
        ],
        'App\Events\OfferDeleted' => [
            'App\Listeners\OfferDeletedListener',
        ],
        'App\Events\OfferFinished' => [
            'App\Listeners\OfferFinishedListener',
        ],

        'App\Events\BidCreated' => [
            'App\Listeners\BidCreatedListener',
        ],
        'App\Events\BidUpdatedd' => [
            'App\Listeners\BidUpdateddListener',
        ],
        'App\Events\BidDeleted' => [
            'App\Listeners\BidDeletedListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
