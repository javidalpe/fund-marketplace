<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'manager'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function funds()
    {
        return $this->hasMany(\App\Models\Fund::class);
    }

    public function vehicles()
    {
        return $this->hasManyThrough(\App\Models\Vehicle::class, \App\Models\Fund::class);
    }

    public function isManager()
    {
        return $this->manager;
    }

    public function isInvestor()
    {
        return $this->manager;
    }

    public function scopeInvestor($query)
    {
        return $query->where('manager', false);
    }

    public function scopeManager($query)
    {
        return $query->where('manager', true);
    }
}
