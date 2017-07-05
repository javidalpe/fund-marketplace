<?php

namespace App\Repositories;

use App\Models\Bid;
use InfyOm\Generator\Common\BaseRepository;

class BidRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'amount',
        'stock_price',
        'status',
        'buyer_comment',
        'seller_comment',
        'buy_fee'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Bid::class;
    }
}
