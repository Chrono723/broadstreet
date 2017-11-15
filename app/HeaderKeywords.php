<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class HeaderKeywords extends Model
{
    protected $table = 'header_keywords';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'is_active',
        'pages',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public static function  generate(){
        if (Cache::has('HeaderKeywords')){
            $Keywords = Cache::get('HeaderKeywords');
        }else{
            $only = ['is_active' => true, 'pages' => 'all'];
            $Keywords = static::where($only)->get();
            Cache::put('HeaderKeywords', $Keywords , 1440);
        }
        $full = ['string' => null, 'array' => []];
        foreach($Keywords as $keyword){array_push($full['array'], $keyword['name']);}
        $full['string'] = implode(', ', $full['array']);
        return $full;
    }
}
