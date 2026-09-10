<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller {
    /**
    * Display the login view.
    */

    public function create(): View {
        return view( 'auth.login' );
    }

    /**
    * Handle an incoming authentication request.
    */

    public function store( LoginRequest $request ): RedirectResponse {
        // $request->authenticate();

        // $request->session()->regenerate();

        // return redirect()->intended( route( 'dashboard', absolute: false ) );

        $user = User::where( 'email', $request->email )->first();

        if ( $user ) {
            if ( $user->is_locked ) {
                return back()->withErrors( [ 'email' => 'Due to too many failed login attempts, your account is locked. Contact super admin for unlocking process.' ] );
            }

            try {
                $request->authenticate();
                $user->update( [ 'NOFA' => 0 ] );

                $request->session()->regenerate();
                //return redirect()->intended( route( 'dashboard', absolute: false ) );

                if ( $user->role_id == 1 ) {
                    return redirect( '/adminhome' );
                } else {
                    return redirect( '/home' );

                }

            } catch( ValidationException $e ) {
                $user->increment( 'NOFA' );
                if ( $user->NOFA >= 5 ) {
                    $user->update( [ 'is_locked' => 1 ] );
                    return back()->withErrors( [ 'email' => 'Due to too many failed login attempts, your account is locked. Contact the super admin for unlock.' ] );
                }
                $attemptsLeft = 5 - $user->NOFA;
                return back()->withErrors( [ 'email' => "Login failed. You have $attemptsLeft attempts left." ] );
            }
        }
        return back()->withErrors( [ 'email' => 'The provided credentials do not match our records.' ] );

    }

    /**
    * Destroy an authenticated session.
    */

    public function destroy( Request $request ): RedirectResponse {
        Auth::guard( 'web' )->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect( '/' );
    }
}
