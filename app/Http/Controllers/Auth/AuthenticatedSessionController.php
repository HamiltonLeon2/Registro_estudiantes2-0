<?php

// app/Http/Controllers/Auth/AuthenticatedSessionController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\LoginAttempt;
use Carbon\Carbon;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $successful = false;

        if (Auth::attempt($request->only('username', 'password'))) {
            $request->session()->regenerate();
            $successful = true;

        }

        $this->logAttempt($request, $successful);

        if ($successful) {
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'username' => __('El correo y/o la contraseña son incorrectos vuelva a intentarlo.'),
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $user->previous_login_at = $user->last_login_at;
        $user->last_login_at = now();
        $user->last_login_ip = $request->ip();
        $user->save();

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    protected function logAttempt(Request $request, bool $successful)
    {
        LoginAttempt::create([
            'username' => $request->input('username'),
            'ip_address' => $request->ip(),
            'successful' => $successful,
        ]);
    }
}
