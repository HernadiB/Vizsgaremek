<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AcceptInvitationRequest extends FormRequest
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
            "senderUserID" => ["required", Rule::in(auth()->user()->ReceivedRequests->pluck('id'))]
        ];
    }

    public function messages()
    {
        return [
            "required" => "A :attribute megadása kötelező!",
            "in" => "Ne írd át a :attribute -t"
        ];
    }

    public function attributes()
    {
        return [
            "senderUserID" => "Felhasználó ID"
        ];
    }
}
