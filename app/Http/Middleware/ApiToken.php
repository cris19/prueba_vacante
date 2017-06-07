<?php

namespace App\Http\Middleware;

use Closure;

class ApiToken
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
      $apiToken = $request->header('api-client-id');

      if($apiToken!="unCodigoSecretoDeApi"){
          abort(403, 'Unauthorized action.');
      }
      return $next($request);
    }
}
