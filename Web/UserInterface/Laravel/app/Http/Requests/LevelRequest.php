<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LevelRequest extends FormRequest
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
            "name" => ["required", "string", "min:1", "max:255"]
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "A :attribute megadása kötelező!",
            "name.min" => "A :attribute legalább 1 karater legyen!",
            "name.max" => "A :attribute legfeljebb 255 karakter legyen!",
        ];
    }

        public function attributes()
    {
        return [
            "name" => "rendfokozat"
        ];
    }
}
