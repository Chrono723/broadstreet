<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    protected $table = 'avatars';
    protected $fillable = [
        'is_active',
        'is_link',
        'url',
        'display_name',
        'user_id',
    ];

    public function user(){return $this -> belongsTo('App\User');}
}
