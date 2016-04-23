<?php

namespace App\Http\Middleware;

use Closure;
use App\ApiLog;

class ApiLogMiddleware
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
        $response = $next($request);

        //TODO: de luat user_id in functie de token
        $user_id = null;

        // SEEMEk: add the rest of the data in log

        $data = [
            'user_id'           => $user_id,
            'controller'        => '',
            'action'            => '',
            'ip'                => $request->ip(),
            'response_code'     => $response->getStatusCode(),
            'request_path'      => $request->getRequestUri(),
            'request_params'    => '',
            'request_method'    => $request->getMethod(),
            'request_headers'   => json_encode($request->header()),
            'dump'              => '',
        ];

        ApiLog::create($data);

        return $response;
    }
}
