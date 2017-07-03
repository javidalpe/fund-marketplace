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
        'website',
        'stock_value'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Vehicle::class;
    }
}
