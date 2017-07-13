<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Vehicle;
use App\Models\Offer;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    const PASSWORD_TO_CHANGE = 'tochange';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'manager', 'nif', 'civil_status', 'address', 'phone'
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

    public function operations()
    {
        return $this->hasMany(\App\Models\Operation::class);
    }

    public function offers()
    {
        return $this->hasMany(\App\Models\Offer::class);
    }

    public function bids()
    {
        return $this->hasMany(\App\Models\Bid::class);
    }

    public function clubs()
    {
        return $this->belongsToMany(\App\Models\Fund::class);
    }

    public function vehicles()
    {
        return $this->hasManyThrough(\App\Models\Vehicle::class, \App\Models\Fund::class);
    }

    public function companies()
    {
        $ids = array_pluck($this->operations()
            ->select('vehicle_id')
            ->groupBy('vehicle_id')
            ->havingRaw('SUM(amount) > 0')
            ->get(), 'vehicle_id');
        return Vehicle::whereIn('id', $ids);
    }

    public function offersAvailable()
    {
        $companiesIds = array_pluck($this->companies()->get(), 'id');
        $fundsIds = array_pluck($this->clubs()
            ->select('vehicles.id')
            ->join('vehicles', 'funds.id', '=', 'vehicles.fund_id')
            ->get(), 'id');

        return Offer::where(function($query) use($companiesIds, $fundsIds) {
                $query->whereIn('vehicle_id', $companiesIds)
                    ->status(Offer::STATUS_VEHICLE_PHASE);
            })
            ->orWhere(function ($query) use($fundsIds) {
                $query->whereIn('vehicle_id', $fundsIds)
                      ->status(Offer::STATUS_CLUB_PHASE);
            });
    }

    public function isManager()
    {
        return $this->manager;
    }

    public function isInvestor()
    {
        return !$this->manager;
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
