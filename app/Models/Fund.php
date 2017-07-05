<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Fund
 * @package App\Models
 * @version July 5, 2017, 2:26 pm UTC
 */
class Fund extends Model
{

    public $table = 'funds';
    


    public $fillable = [
        'name',
        'website',
        'email',
        'contact',
        'phone',
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
        'email' => 'string',
        'contact' => 'string',
        'phone' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:3',
        'website' => 'url',
        'email' => 'email',
        'contact' => 'min:3',
        'phone' => 'min:3'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function vehicles()
    {
        return $this->hasMany(\App\Models\Vehicle::class);
    }
}
