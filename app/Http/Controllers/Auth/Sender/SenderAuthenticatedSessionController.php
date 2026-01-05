<?php

namespace App\Http\Controllers\Auth\Sender;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SenderLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class SenderAuthenticatedSessionController extends Controller
{
    /**
     * Display the sender login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/SenderLogin', [
            'canResetPassword' => Route::has('sender.password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming sender authentication request.
     */
    public function store(SenderLoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('sender.dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated sender session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('sender')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
