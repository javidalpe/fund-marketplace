<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Operation
 * @package App\Models
 * @version July 5, 2017, 2:26 pm UTC
 */
class Operation extends Model
{

    public $table = 'operations';



    public $fillable = [
        'type',
        'amount',
        'stock_price',
        'completed_at',
        'vehicle_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'type' => 'string',
        'amount' => 'integer',
        'stock_price' => 'float',
        'completed_at' => 'date',
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
        'stock_price' => 'required|numeric|min:0',
        'completed_at' => 'required'
    ];

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

}
