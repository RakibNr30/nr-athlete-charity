<?php

namespace App\Http\Middleware;

use App\Helpers\AuthManager;
use Closure;
use Illuminate\Http\Request;

class Donner
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!AuthManager::isUser()) {
            return redirect()->to('/');
        }

        return $next($request);
    }
}
