<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ModifyUserRequest extends FormRequest
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
            "full_name" => ["nullable", "string", "min:1", "max:255"],
            "username" => ["nullable", Rule::unique('users')->ignore($this->session()->get('user.id')), "string", "min:1", "max:255"],
            "email" => ["nullable", "email", Rule::unique('users')->ignore($this->session()->get('user.id')), "min:5", "max:255"],
            "birthdate" => ["nullable", "date"],
            "gender" => ["nullable", Rule::in(["M", "F"])],
            "password_new" => ["nullable", "string", "min:5", "max:255", "confirmed"],
            "profile_picture" => ["nullable", "image"]
        ];
    }

    public function messages()
    {
        return [
            "full:name.min" => "A :attribute legalább 1 karater legyen!",
            "full_name.max" => "A :attribute legfeljebb 255 karakter legyen!",
            "username.min" => "A :attribute legalább 1 karater legyen!",
            "username.max" => "A :attribute legfeljebb 255 karakter legyen!",
            "username.unique" => "Ez az :attribute már szerepel az adatbázisban!",
            "email.unique" => "Ez az :attribute már szerepel az adatbázisban!",
            "email.email" => "Az :attributenek tartalmaznia kell a @ karaktert!",
            "profile_picture.image" => "A :attribute formátuma nem megfelelő!",
            "password_new.min" => "A :attribute legalább 5 karater legyen!",
            "password_new.max" => "A :attribute legfeljebb 255 karater legyen!",
            "password.confirmed" => "A megadott jelszavak nem egyeznek!",
        ];
    }

    public function attributes()
    {
        return [
            "full_name" => "teljes név",
            "username" => "felhasználónév",
            "email" => "email cím",
            "password_new" => "jelszó",
            "profile_picture" => "profilkép",
        ];
    }
}
