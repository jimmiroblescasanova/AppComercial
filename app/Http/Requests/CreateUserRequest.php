<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|string|min:6',
            'rfc' => 'required|string|min:12|max:13|unique:users',
            'phone' => 'nullable|digits:10',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|string|min:6',
        ];
    }
}
