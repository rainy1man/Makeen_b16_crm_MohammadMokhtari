<?php

namespace App\Http\Requests\OrderRequests;

use Illuminate\Foundation\Http\FormRequest;

class EditOrderRequest extends FormRequest
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
            'customerName' => ['required'],
            'orderNumber' => ['required', 'digits:10', 'unique:orders,orderNumber,' . $this->id],
            'price' => ['required', 'integer'],
            'phoneNumber' => ['required', 'digits:11', 'regex:/(09)[0-9]{9}/'],
            'address' => ['required']
        ];
    }
}
