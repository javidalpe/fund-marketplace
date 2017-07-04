<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Vehicle
 * @package App\Models
 * @version July 4, 2017, 9:16 pm UTC
 */
class Vehicle extends Model
{

    public $table = 'vehicles';
    


    public $fillable = [
        'name',
        'company',
        'website',
        'stock_value',
        'fund_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'company' => 'string',
        'website' => 'string',
        'stock_value' => 'float',
        'fund_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:3',
        'company' => 'required|min:3',
        'website' => 'required|url',
        'stock_value' => 'numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function fund()
    {
        return $this->belongsTo(\App\Models\Fund::class);
    }
}
