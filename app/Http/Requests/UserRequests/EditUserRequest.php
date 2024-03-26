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
            'codeMelli' => ['required', 'unique:users,codeMelli,' . $this->user],
            'phoneNumber' => ['required', 'digits:11', 'regex:/(09)[0-9]{9}/', 'unique:users,phoneNumber,' . $this->user],
            'email' => ['required', 'unique:users,email,' . $this->user],
            'password' => ['required', 'between:6,12', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/']
        ];
    }
    public function messages(): array
    {
        return [
            'required' => ':attribute اجباری است',
            'between' => ':attribute باید بین :min و :max باشد'
        ];
    }
    public function attributes(): array
    {
        return [
            'password' => 'رمز عبور',
            'email' => 'ایمیل',
            'phoneNumber' => 'شماره همراه',
            'codeMelli' => 'کد ملی',
            'name' => 'نام و نام خانوادگی'
        ];
    }
}
