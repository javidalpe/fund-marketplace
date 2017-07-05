<?php

namespace App\Repositories;

use App\Models\Offer;
use InfyOm\Generator\Common\BaseRepository;

class OfferRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'amount',
        'stock_price',
        'status',
        'sell_fee'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Offer::class;
    }
}
