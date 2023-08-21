<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddBranchRequest extends FormRequest
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
            'name' => 'required | min:3',
            'address' => 'required | min:3',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El nombre de la sucursal es requerido',
            'name.min' => 'El nombre de la sucursal debe ser real',
            'address.required' => 'La dirección de la sucursal es requerido',
            'address.min' => 'La dirección de la sucursal debe ser real',
        ];
    }
}
