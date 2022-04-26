<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            "name" => ["required", "string", "min:1", "max:255"],
            "description" => ["required", "string", "min:1", "max:255"],
            "image" => ["required", "string"],
            "score" => ["required", "integer"],
            "level_id" => ["required", "integer"]
        ];
    }

    public function messages()
    {
        return [
            "required" => "A(z) :attribute megadása kötelező!",
            "min" => "A(z) :attribute legalább :min karater legyen!",
            "max" => "A(z) :attribute legfeljebb :max karakter legyen!",
            "integer" => "A(z) :attribute értéke szám legyen!"
        ];
    }

    public function attributes()
    {
        return [
            "name" => "megnevezés",
            "description" => "leírás",
            "image" => "kép",
            "score" => "pontszám",
            "level_id" => "szint ID"
        ];
    }
}
