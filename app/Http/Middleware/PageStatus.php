<?php

namespace App\Http\Middleware;

use Closure;
use App\PageStatus as Pages;

class PageStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $PageStatuses =  Pages::all();

        foreach($PageStatuses as $PageStatus){
            if (($PageStatus['uri'] == $request->route()->uri) && ($PageStatus['request_method'] == $request->method())){
                switch($PageStatus['status']){
                    case'up':   return $next($request); break;
                    case'down':
                    case'soon':
                    case'admin':
                        return response()->json([
                            'page' => $PageStatus['name'],
                            'status'=> $PageStatus['status'],
                            'data' => [
                                'uri' => $PageStatus['uri'],
                                'request_method' => $PageStatus['request_method'],
                                'description' => $PageStatus['description']
                            ]
                        ]);break;
                }
            }
        }
        return $next($request);
    }
}
