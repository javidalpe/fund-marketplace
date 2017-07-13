<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Example
 * @package App\Models
 * @version July 13, 2017, 8:23 am UTC
 */
class Example extends Model
{

    public $table = 'examples';
    


    public $fillable = [
        'title',
        'title',
        'title',
        'title',
        'title',
        'title',
        'title',
        'title',
        'title'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'title' => 'boolean',
        'title' => 'string',
        'title' => 'string',
        'title' => 'string',
        'title' => 'string',
        'title' => 'string',
        'title' => 'string',
        'title' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'title' => 'required',
        'title' => 'required',
        'title' => 'required',
        'title' => 'required',
        'title' => 'required',
        'title' => 'required',
        'title' => 'required',
        'title' => 'required'
    ];

    
}
