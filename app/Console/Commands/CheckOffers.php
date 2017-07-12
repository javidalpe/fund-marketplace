<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Offer;
use App\Notifications\OfferAvailable;
use App\Events\OfferExpired;
use App\Events\OfferClubPhase;
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
        $created = Offer::whereNotNull('amount')->status(Offer::STATUS_VEHICLE_PHASE)->get();
        foreach ($created as $key => $offer) {
            $days = $now->diffInDays($offer->updated_at);

            if ($days > 7) {
                $this->handleWeekOffer($offer);
            }
        }

        $created = Offer::whereNotNull('amount')->status(Offer::STATUS_CLUB_PHASE)->get();
        foreach ($created as $key => $offer) {
            $days = $now->diffInDays($offer->updated_at);

            if ($days > 14) {
                $this->handleTwoWeeksOffer($offer);
            }
        }
    }

    public function handleWeekOffer(Offer $offer)
    {
        if ($offer->bids()->created()->count() > 0) {
            $this->completeOffer($offer);
        } else {
            $this->clubPhaseOffer($offer);
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

    public function clubPhaseOffer(Offer $offer)
    {
        $offer->status = Offer::STATUS_CLUB_PHASE;
        $offer->save();

        event(new OfferClubPhase($offer));
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
