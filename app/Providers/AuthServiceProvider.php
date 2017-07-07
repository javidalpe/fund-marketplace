<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \App\User::class => \App\Policies\UserPolicy::class,
        \App\Models\Fund::class => \App\Policies\FundPolicy::class,
        \App\Models\Vehicle::class => \App\Policies\VehiclePolicy::class,
        \App\Models\Operation::class => \App\Policies\OperationPolicy::class,
        \App\Models\Offer::class => \App\Policies\OfferPolicy::class,
        \App\Models\Bid::class => \App\Policies\BidPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
