<?php

namespace App\Http\Middleware;
use App\User;
use Closure;
use Auth;
class miminMiddleware
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
              // dd($request);
        $mimin = $request->user();
        if ($mimin) {
         if ($mimin->isAdmin()) {
             return $next($request);
         }
     }

      // if (Auth::User()->isAdmin()) {
      //   return $next($request);
      // }

     return abort(404);
 }
}
