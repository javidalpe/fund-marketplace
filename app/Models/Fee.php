<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Fee
 * @package App\Models
 * @version July 5, 2017, 2:26 pm UTC
 */
class Fee extends Model
{

    public $table = 'fees';

    public $fillable = [
        'from',
        'to',
        'min',
        'percentage',
        'fund_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'from' => 'integer',
        'to' => 'integer',
        'min' => 'integer',
        'percentage' => 'float',
        'fund_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'from' => 'numeric|min:0',
        'to' => 'numeric|min:0',
        'min' => 'numeric|min:0',
        'percentage' => 'requiered|numeric|min:0',
        'fund_id' => 'requiered|numeric',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function fund()
    {
        return $this->belongsTo(\App\Models\Fund::class);
    }

}
