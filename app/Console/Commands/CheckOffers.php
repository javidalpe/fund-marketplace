<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Offer;
use App\Notifications\OfferAvailable;
use App\Events\OfferExpired;
use App\Events\OfferSuccess;

class CheckOffers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'offers:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check offers status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $now = Carbon::now();
        $created = Offer::whereNotNull('amount')->created()->get();
        foreach ($created as $key => $offer) {
            $days = $now->diffInDays($offer->updated_at);

            if ($days == 8) {
                $this->handleWeekOffer($offer);
            } else if ($days == 15) {
                $this->handleTwoWeeksOffer($offer);
            }
        }
    }

    public function handleWeekOffer(Offer $offer)
    {
        if ($offer->bids()->created()->count() > 0) {
            $this->completeOffer($offer);
            return;
        }

        $vehicle = $offer->vehicle;
        $fund = $vehicle->fund;
        $vehicleInvestors = $vehicle->investors()->where('id', '!=', $offer->user_id)->get();

        $investors = $fund->users()->whereNotIn('id', array_pluck($vehicleInvestors, 'id'))->get();

        foreach ($investors as $key => $investor) {
            $investor->notify(new OfferAvailable($offer));
        }
    }

    public function handleTwoWeeksOffer(Offer $offer)
    {
        if ($offer->bids()->created()->count() > 0) {
            $this->completeOffer($offer);
        } else {
            $this->expireOffer($offer);
        }
    }

    public function expireOffer(Offer $offer)
    {
        $offer->status = Offer::STATUS_EXPIRED;
        $offer->save();

        event(new OfferExpired($offer));
    }

    public function completeOffer(Offer $offer)
    {
        $offer->status = Offer::STATUS_COMPLETED;
        $offer->save();

        event(new OfferSuccess($offer));
    }
}
