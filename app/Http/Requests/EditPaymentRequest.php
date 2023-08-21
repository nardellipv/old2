<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPaymentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'payment' => 'required | min:3',
        ];
    }
    public function messages()
    {
        return [
            'payment.required' => 'El medio de pago es requerido',
            'payment.min' => 'El medio de pago debe ser real',
        ];
    }
}
