<?php

namespace App\Http\Requests\UserRequests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            //, 'unique:users,name'
            'name' => ['required'],
            'codeMelli' => ['required', 'integer'],
            'phoneNumber' => ['required', 'between:11,11'],
            'password' => ['required', 'between:6,12']
        ];
    }
}
