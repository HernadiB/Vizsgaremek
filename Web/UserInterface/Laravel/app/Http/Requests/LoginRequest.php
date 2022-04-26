<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => ["required", "email"],
            'password' => ["required", "string"]
        ];
    }
    public function messages()
    {
        return [
            "required" => "A(z) :attribute megadása kötelező!",
            "email" => "Az email címnek tartalmaznia kell a @ karaktert!"
        ];
    }

    public function attributes()
    {
        return [
            "email" => "email cím",
            "password" => "jelszó"
        ];
    }
}
