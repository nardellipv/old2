<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'email' => 'required | min:3',
            'phone' => 'required | min:3',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre debe ser real',
            'email.required' => 'El email es requerido',
            'email.min' => 'El email debe ser real',
            'phone.required' => 'El teléfono es requerido',
            'phone.min' => 'El teléfono debe ser real',
        ];
    }
}
