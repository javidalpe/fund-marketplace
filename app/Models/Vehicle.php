<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Vehicle
 * @package App\Models
 * @version July 3, 2017, 9:07 pm UTC
 */
class Vehicle extends Model
{

    public $table = 'vehicles';
    


    public $fillable = [
        'name',
        'website',
        'stock_value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'website' => 'string',
        'stock_value' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:3',
        'website' => 'required|url',
        'stock_value' => 'required'
    ];

    
}
