<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateAgentRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|min:5',
            'email' => 'required|email|unique:agents',
            'password' => 'required|string|min:6|confirmed',
        ];

        if ($this->agent_id != 0)
        {
            $rules['agent_id'] = 'required|unique:agents,agent_id';
        } else {
            $rules['agent_id'] = 'required';
        }

        return $rules;
    }
}
