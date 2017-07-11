<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Bid
 * @package App\Models
 * @version July 5, 2017, 2:28 pm UTC
 */
class Bid extends Model
{

    public $table = 'bids';

    const STATUS_CREATED = 'Created';
    const STATUS_CANCELLED = 'Cancelled';
    const STATUS_COMPLETED = 'Completed';
    const STATUS_DECLINED = 'Declined';

    public $fillable = [
        'amount',
        'stock_price',
        'status',
        'buyer_comment',
        'seller_comment',
        'buy_fee',
        'offer_id',
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
        'buyer_comment' => 'string',
        'seller_comment' => 'string',
        'buy_fee' => 'float',
        'offer_id' => 'integer',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function offer()
    {
        return $this->belongsTo(\App\Models\Offer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function scopeCreated($query)
    {
        return $query->where('status', self::STATUS_CREATED);
    }
}
