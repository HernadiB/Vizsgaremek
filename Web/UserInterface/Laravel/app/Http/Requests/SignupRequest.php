<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "full_name" => ["required", "string", "min:1", "max:255"],
            "username" => ["required", "unique:users", "string", "min:1", "max:255"],
            "birthdate" => ["required", "date"],
            "gender" => ["required", Rule::in(["M", "F"])],
            "email" => ["required", "email", "unique:users,email", "min:5", "max:255"],
            "password" => ["required", "string", "min:5", "max:255", "confirmed"],
        ];
    }

    public function messages()
    {
        return [
            "full_name.required" => "A :attribute megadása kötelező!",
            "full:name.min" => "A :attribute legalább 1 karater legyen!",
            "full_name.max" => "A :attribute legfeljebb 255 karakter legyen!",
            "username.required" => "A :attribute megadása kötelező!",
            "username.min" => "A :attribute legalább 1 karater legyen!",
            "username.max" => "A :attribute legfeljebb 255 karakter legyen!",
            "username.unique" => "Ez az :attribute már szerepel az adatbázisban!",
            "email.required" => "Az :attribute megadása kötelező!",
            "email.unique" => "Ez az :attribute már szerepel az adatbázisban!",
            "email.email" => "Az :attributeek tartalmaznia kell a @ karaktert!",
            "password.required" => "A :attribute megadása kötelező!",
            "password.min" => "A :attribute legalább 5 karater legyen!",
            "password.max" => "A :attribute legfeljebb 255 karater legyen!",
            "password.confirmed" => "A megadott jelszavak nem egyeznek!",
        ];
    }

    public function attributes()
    {
        return [
            "full_name" => "teljes név",
            "username" => "felhasználónév",
            "email" => "email cím",
            "password" => "jelszó",
        ];
    }
}
