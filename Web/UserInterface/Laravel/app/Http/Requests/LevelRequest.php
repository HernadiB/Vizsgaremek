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
            "required" => "A :attribute megadása kötelező!",
            "min" => "A :attribute legalább :min karater legyen!",
            "max" => "A :attribute legfeljebb :max karakter legyen!",
        ];
    }

        public function attributes()
    {
        return [
            "name" => "szint"
        ];
    }
}
