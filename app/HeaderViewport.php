<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class HeaderViewport extends Model
{
    protected $table = 'header_viewports';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'property',
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
        if (Cache::has('HeaderViewport')){
            $Viewports = Cache::get('HeaderViewport');
        }else{
            $only = ['is_active' => true, 'pages' => 'all'];
            $Viewports = static::where($only) -> get();
            Cache::put('HeaderViewport', $Viewports , 1440);
        }
        $full = ['string' => null, 'array' => []];
        foreach($Viewports as $Viewport){array_push($full['array'], $Viewport['property']);}
        $full['string'] = implode(', ', $full['array']);
        return $full;
    }
}
