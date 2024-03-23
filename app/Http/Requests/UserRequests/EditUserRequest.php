<?php

namespace App\Http\Requests\UserRequests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //, 'unique:table,column,' . $this->id
            'name' => ['required'],
            'codeMelli' => ['required', 'unique:users,codeMelli,' . $this->id],
            'phoneNumber' => ['required', 'digits:11', 'regex:/(09)[0-9]{9}/', 'unique:users,phoneNumber,'. $this->id],
            'email' => ['required', 'unique:users,email,'. $this->id],
            'password' => ['required', 'between:6,12', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/']
        ];
    }
}
