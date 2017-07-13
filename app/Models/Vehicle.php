<?php

namespace App\Models;

use Eloquent as Model;
use App\User;

/**
 * Class Vehicle
 * @package App\Models
 * @version July 5, 2017, 2:26 pm UTC
 */
class Vehicle extends Model
{

    public $table = 'vehicles';



    public $fillable = [
        'name',
        'company',
        'website',
        'stock_price',
        'shares_amount',
        'company_stock_price',
        'company_shares_amount',
        'email',
        'contact',
        'phone',
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
        'stock_price' => 'float',
        'shares_amount' => 'integer',
        'company_stock_price' => 'float',
        'company_shares_amount' => 'integer',
        'email' => 'string',
        'contact' => 'string',
        'phone' => 'string',
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
        'stock_price' => 'numeric',
        'shares_amount' => 'numeric',
        'company_stock_price' => 'numeric',
        'company_shares_amount' => 'numeric',
        'email' => 'email',
        'contact' => 'min:3',
        'phone' => 'min:3'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function fund()
    {
        return $this->belongsTo(\App\Models\Fund::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function operations()
    {
        return $this->hasMany(\App\Models\Operation::class);
    }

    public function investors()
    {
        $user_ids = $this->operations()
                ->select('user_id')
                ->groupBy('user_id')
                ->havingRaw('SUM(amount) > 0')
                ->get();
        $ids = array_pluck($user_ids, 'user_id');
        return User::whereIn('id',$ids);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function offers()
    {
        return $this->hasMany(\App\Models\Offer::class);
    }
}
