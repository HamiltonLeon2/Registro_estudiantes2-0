<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LoginAttempt;

class LogAuthenticationAttempts
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
        // Before handling the request, log the login attempt
        if ($request->isMethod('post') && $request->route()->named('login')) {
            $this->logAttempt($request);
        }

        return $next($request);
    }

    protected function logAttempt(Request $request)
    {
        $ipAddress = $request->ip();
        $username = $request->input('username');

        LoginAttempt::create([
            'username' => $username,
            'ip_address' => $ipAddress,
            'successful' => Auth::attempt($request->only('username', 'password')),
        ]);
    }
}
