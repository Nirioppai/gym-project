<?php

namespace App\Http\Controllers\Staff\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StaffLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
   /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('staff.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  StaffLoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StaffLoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::STAFF_HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('staff')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // BEHAVIOR CHANGE: Redirect to the staff login page instead of the homepage.
        // return redirect('/staff/login');

        // CURRENT BEHAVIOR: redirect to the homepage.
        return redirect('/');
    }
}
