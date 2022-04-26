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
            "required" => "A(z) :attribute megadása kötelező!",
            "min" => "A(z) :attribute legalább :min karater legyen!",
            "max" => "A(z) :attribute legfeljebb :max karakter legyen!",
            "unique" => "Ez a(z) :attribute már szerepel az adatbázisban!",
            "date" => "A(z) :attribute formátuma nem megfelelő",
            "in" => "A(z) :attribute a következő értékek egyike kell, hogy legyen: :values",
            "email" => "Az emailnek tartalmaznia kell a @ karaktert!",
            "password.confirmed" => "A megadott jelszavak nem egyeznek!",
        ];
    }

    public function attributes()
    {
        return [
            "full_name" => "teljes név",
            "username" => "felhasználónév",
            "birthdate" => "születési dátum",
            "gender" => "nem",
            "email" => "email cím",
            "password" => "jelszó",
        ];
    }
}
