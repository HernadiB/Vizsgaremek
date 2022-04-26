<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            "name" => ["required", "string", "min:1", "max:255", "unique:teams"],
            "description" => ["nullable", "string"],
            "leader_id" => ["nullable", "integer"]
        ];
    }

    public function messages()
    {
        return [
            "required" => "A(z) :attribute megadása kötelező!",
            "min" => "A(z) :attribute legalább 1 karater legyen!",
            "max" => "A(z) :attribute legfeljebb 255 karakter legyen!",
            "unique" => "Ez a(z) :attribute már szerepel az adatbázisban!",
            "integer" => "A(z) :attribute értéke szám legyen!"
        ];
    }

    public function attributes()
    {
        return [
            "name" => "név",
            "description" => "leírás",
            "leader_id" => "vezető ID"
        ];
    }
}
