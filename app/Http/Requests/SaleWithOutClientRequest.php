<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleWithOutClientRequest extends FormRequest
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
            'payment_id' => 'required',
            'employee_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'payment_id.required' => 'El pago es requerido',
            'employee_id.required' => 'El barbero es requerido',
        ];
    }
}
