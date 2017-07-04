<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Fund
 * @package App\Models
 * @version July 4, 2017, 9:16 pm UTC
 */
class Fund extends Model
{

    public $table = 'funds';
    


    public $fillable = [
        'name',
        'website',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'website' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:3',
        'website' => 'url'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
