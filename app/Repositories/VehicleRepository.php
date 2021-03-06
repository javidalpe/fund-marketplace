<?php

namespace App\Repositories;

use App\Models\Vehicle;
use InfyOm\Generator\Common\BaseRepository;

class VehicleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'company',
        'website',
        'stock_price',
        'shares_amount',
        'email',
        'contact',
        'phone'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Vehicle::class;
    }
}
