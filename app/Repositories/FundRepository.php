<?php

namespace App\Repositories;

use App\Models\Fund;
use InfyOm\Generator\Common\BaseRepository;

class FundRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'website',
        'email',
        'contact',
        'phone'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Fund::class;
    }
}
