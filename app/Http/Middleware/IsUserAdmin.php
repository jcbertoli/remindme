<?php

namespace App\Http\Middleware;

use App\Enum\RoleEnum;
use Closure;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class IsUserAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth()->user()->role != RoleEnum::Admin)
            return abort(Response::HTTP_FORBIDDEN);

        return $next($request);
    }
}
