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
            "score" => ["required", "integer"],
            "level_id" => ["required", "integer"]
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "A feladat nevének megadása kötelező!",
            "name.min" => "A :attribute legalább 1 karater legyen!",
            "name.max" => "A :attribute legfeljebb 255 karakter legyen!",
            "description.required" => "A :attribute megadása kötelező!",
            "description.min" => "A :attribute legalább 1 karater legyen!",
            "description.max" => "A :attribute legfeljebb 255 karakter legyen!",
            "score.required" => "Az :attribute megadása kötelező!",
        ];
    }

    public function attributes()
    {
        return [
            "name" => "feladat neve",
            "description" => "feladat leírása",
            "score" => "csapat pontszáma",
        ];
    }
}
