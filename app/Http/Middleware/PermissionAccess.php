<?php

namespace App\Http\Middleware;

use Closure;

class PermissionAccess
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
        if($request -> user() -> permission != 'admin'){

            return redirect('access-denied')->with('data', [
                'status'=> 'Access Denied',
                'url' => $request->url(),
                'method' => $request->method(),
                'input' => $request->all()
            ]);

        }
        return $next($request);
    }
}
