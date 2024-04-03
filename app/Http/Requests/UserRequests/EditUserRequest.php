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
            'firstName' => ['required'],
            'lastName' => ['required'],
            'nationalCode' => ['required', 'unique:users,nationalCode,' . $this->user],
            'phoneNumber' => ['required', 'digits:11', 'regex:/(09)[0-9]{9}/', 'unique:users,phoneNumber,' . $this->user],
            'email' => ['required', 'unique:users,email,' . $this->user]
        ];
    }
}
