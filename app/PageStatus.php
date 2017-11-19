<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageStatus extends Model
{
    protected $table = 'page_statuses';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uri',
        'name',
        'status',
        'request_method',
        'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
