<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Roles;
use App\Models\Country;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller {
    /**
    * Display the registration view.
    */

    public function create(): View {

        $roles = [];

        $countries = Country::all();

        //$roles = Roles::all();

        if ( auth()->check() && auth()->user()->hasRole( 'superuser' ) ) {
            $roles = Roles::all();
        }

        return view( 'auth.register', compact( 'countries', 'roles' ) );
    }

    /**
    * Handle an incoming registration request.
    *
    * @throws \Illuminate\Validation\ValidationException
    */

    public function store( Request $request ): RedirectResponse {
        // $request->validate( [
        //     'name' => [ 'required', 'string', 'max:255' ],
        //     'email' => [ 'required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class ],
        //     'password' => [ 'required', 'confirmed', Rules\Password::defaults() ],
        // ] );

        $request->validate( [
            'name' => [ 'required', 'string', 'max:255' ],
            'email' => [ 'required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class ],
            'password' => [ 'required', 'confirmed', Rules\Password::defaults() ],
            'country_id' => [ 'required', 'exists:countries,id' ],
            'age' => [ 'required', 'integer', 'min:18' ],
        ] );

        // $user = User::create( [
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make( $request->password ),
        // ] );

        $roleId = $request->input( 'role_id', 2 );

        $user = User::create( [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make( $request->password ),
            'role_id' => $roleId,
            'NOFA' => 0,
            'is_locked' => false,
            'country_id' => $request->country_id,
            'age' => $request->age,
        ] );

        event( new Registered( $user ) );

        // Auth::login( $user );

        // return redirect( route( 'dashboard', absolute: false ) );

        if ( auth()->check() && auth()->user()->hasRole( 'superuser' ) ) {
            return redirect()->route( 'admin.users.index' )->with( 'success', 'User created successfully' );
        } else {
            Auth::login( $user );
            return redirect( route( 'dashboard', absolute: false ) );
        }

    }
}
