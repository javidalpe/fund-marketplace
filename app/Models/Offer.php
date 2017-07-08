<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Offer
 * @package App\Models
 * @version July 5, 2017, 2:28 pm UTC
 */
class Offer extends Model
{

    public $table = 'offers';

    const STATUS_CREATED = 'Created';
    const STATUS_CANCELLED = 'Cancelled';
    const STATUS_COMPLETED = 'Completed';
    const STATUS_EXPIRED = 'Expired';

    public $fillable = [
        'amount',
        'stock_price',
        'status',
        'sell_fee',
        'vehicle_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'amount' => 'integer',
        'stock_price' => 'float',
        'status' => 'string',
        'sell_fee' => 'float',
        'vehicle_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'amount' => 'required|numeric',
        'stock_price' => 'required|numeric'
    ];

    public function scopeCreated($query)
    {
        return $query->where('status', self::STATUS_CREATED);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function vehicle()
    {
        return $this->belongsTo(\App\Models\Vehicle::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bids()
    {
        return $this->hasMany(\App\Models\Bid::class);
    }
}
