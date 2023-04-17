<?php

namespace App\Http\Middleware;

use App\Helpers\IPHelper;
use App\Traits\ApiResponse;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TestMiddleware
{
    use ApiResponse;

    /**
     * @param Request $request
     * @param Closure $next
     * @return JsonResponse|mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (in_array($request->ip(), IPHelper::blocked())) {
            return $this->responseError("Your IP is blocked");
        }
        if ($request->user()->isAdmin()) {
            return $this->responseUnauthorized();
        }
        return $next($request);
    }
}
