<?php

namespace App\Http\Requests;


use App\Models\Candidate;
use App\Rules\AgeCheck;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest {
    /**
    * Determine if the user is authorized to make this request.
    */

    public function authorize(): bool {
        return true;
    }

    /**
    * Get the validation rules that apply to the request.
    *
    * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
    */

    public function rules(): array {
        return [
            'firstname' => [ 'required', 'string', 'min:5', 'max:15' ],
            'lastname' => [ 'required', 'string', 'min:3', 'max:50', 'uppercase' ],
            'middlename' => [ 'required', 'string', 'min:3', 'max:50', 'regex:/^[a-zA-Z\s]*$/' ],
            'password' => [ 'required', 'min:5', 'max:15', 'confirmed' ],
            'password_confirmation' => [ 'required', 'min:5', 'max:15' ],

            'gender' => [ 'required' ],
            'birthdate' => [ 'required', 'date', 'before:today' ],
            'hiredate' => [ 'required', 'date', 'after:today', 'date_format:Y-m-d' ],

            'email' => [ 'required', 'email', 'unique:candidates', 'ends_with:@gmail.com' ],
            'phone' => [ 'required', 'numeric', 'digits_between:10,13', 'unique:candidates' ],
            'postalcode' => [ 'required', 'numeric', 'min:4', 'max:7' ],

            'websiteurl' => [ 'required', 'url' ],
            'termsandconditions' => [ 'required', 'accepted' ],
            'role' => [ 'required', 'in:admin,moderator,regular' ],

            'age' => [ 'required', 'integer', 'digits_between:2,2',new AgeCheck],
            'salary' => [ 'nullable', 'numeric', 'decimal:2', 'min:10000', 'max:100000' ],

            'profile_picture' => [ 'nullable', 'image', 'mimes:jpeg,png,jpg' ],
            'amount' => [ 'nullable', 'numeric', 'multiple_of:5' ],
            'secondary_email' => [ 'nullable', 'email', 'different:email' ],

        ];
    }

    public function messages(): array {
        return [
            'firstname.required' => 'The firstname field is required.',
            'lastname.required' => 'The lastname field is required.',
            'email.unique' => 'The email has already been taken.',
        ];
    }

}
