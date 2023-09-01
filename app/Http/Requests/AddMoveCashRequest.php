<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddMoveCashRequest extends FormRequest
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
            'mount' => 'required | numeric',
            'comment' => 'required | min:3',
            'payment_id' => 'required',
            'move' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'mount.required' => 'El monto es requerido',
            'name.numeric' => 'El monto debe ser real',
            'comment.required' => 'El motivo es requerido',
            'comment.min' => 'El motivo debe ser real',
            'payment_id.required' => 'El medio de pago del movimiento es requerido',
            'move.required' => 'Surgio un problema y no pudimos ingresar el movimiento. Contacte al administrador del sistema',
        ];
    }
}
