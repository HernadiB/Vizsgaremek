<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "username" => ["required", "unique:users,username", "string", "min:1", "max:255"],
            "email" => ["required", "email", "unique:users,email", "min:5", "max:255"],
            "password" => ["required", "string", "min:5", "max:255", "confirmed"],
            "password_confirmation" => ["required", "same:password"],
            "role" => ["required", "string", "min:1", "max:255"],
            "profile_picture" => ["string", "nullable", "min:1", "max:255"],
            "score" => ["required", "integer"]
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
            "email.email" => "Az email címnek tartalmaznia kell a @ karaktert!",
            "password.required" => "A :attribute megadása kötelező!",
            "password.min" => "A :attribute legalább 5 karater legyen!",
            "password.max" => "A :attribute legfeljebb 225 karater legyen!",
            "password_confirmation.same:password" => "A megadott jelszavak nem egyeznek!",
        ];
    }

    public function attributes()
    {
        return [
            "full_name" => "teljes név",
            "username" => "felhasználónév",
            "email" => "email cím",
            "password" => "jelszó",
            "password_confirmation" => "jelszó megerősítés",
            "role" => "role",
            "profile_picture" => "profilkép",
            "score" => "pontszám",
        ];
    }
}
