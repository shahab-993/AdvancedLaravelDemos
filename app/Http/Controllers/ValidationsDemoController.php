<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ValidationsDemoController extends Controller {
    public function create() {
        return view( 'validationsdemo.create' );

    }

    public function store( StorePostRequest $request ) {

        $validated = $request->validated();

        if ( $request->hasFile( 'profile_picture' ) ) {
            $filePath = $request->file( 'profile_picture' )->store( 'profile_pictures' );
            $validated[ 'profile_picture' ] = $filePath;
        }

        Candidate::create( [
            'firstname' => $validated[ 'firstname' ],
            'lastname' => $validated[ 'lastname' ],
            'middlename' => $validated[ 'middlename' ],
            'password' => bcrypt( $validated[ 'password' ] ),
            'gender' => $validated[ 'gender' ],
            'birthdate' => $validated[ 'birthdate' ],
            'hiredate' => $validated[ 'hiredate' ],
            'email' => $validated[ 'email' ],
            'phone' => $validated[ 'phone' ],
            'postalcode' => $validated[ 'postalcode' ],
            'websiteurl' => $validated[ 'websiteurl' ],

            'role' => $validated[ 'role' ],
            'age' => $validated[ 'age' ],
            'salary' => $validated[ 'salary' ],
            'profile_picture' => $validated[ 'profile_picture' ] ?? null,
            'amount' => $validated[ 'amount' ],
            'secondary_email' => $validated[ 'secondary_email' ],

            'termsandconditions' => ( $validated[ 'termsandconditions' ] == 'ON' ) ? 1 : 0,

        ] );

        return redirect()->back()->with( 'success', 'Data stored successfully!' );

    }

}
