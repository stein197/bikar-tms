<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectAuthenticatedUser {

    public function handle(Request $request, Closure $next): Response {
        if (auth()->check())
            return redirect('/tasks');
        return $next($request);
    }
}
