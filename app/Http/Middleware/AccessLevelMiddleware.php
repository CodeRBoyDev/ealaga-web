<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccessLevelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$requiredAccessLevels)
    {
        if (auth()->check()) {
            $user = auth()->user();
            if (in_array($user->access_level, $requiredAccessLevels)) {
                return $next($request);
            } else {
                return redirect()->back()->with('error', 'You do not have the required access level.');
            }
        }

        return redirect()->route('login'); // Replace 'login' with your actual login route name
    }
}
