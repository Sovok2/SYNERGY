<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('web')->guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname' => ['required', 'string'],
            'email' => ['required', 'email:filter', 'unique:users,email'],
            'passport_data' => ['required', 'string',],
            'password' => ['required', 'string', 'confirmed', 'min:8']
        ];
    }
}
