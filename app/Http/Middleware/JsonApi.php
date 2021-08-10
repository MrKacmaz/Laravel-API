<?php

namespace App\Http\Middleware;

use App\Models\Client;
use Closure;
use Illuminate\Http\Request;

class JsonApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $header = $request->header('xapikey');

        $allClients = Client::all();
        foreach ($allClients as $client) {
            if ($client->xapikey == $header && $client->isActive == 1) {
                return $next($request);
            }
        }
        
    }
}
