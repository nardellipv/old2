<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'price' => 'required | numeric',
            'offer' => 'numeric',
            'point' => 'required | numeric',
            'point_changed' => 'required | numeric',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre debe ser real',
            'price.required' => 'El precio es requerido',
            'price.numeric' => 'El precio debe ser real',
            'offer.numeric' => 'La oferta debe ser real',
            'point.required' => 'Los puntos son requeridos',
            'point.numeric' => 'Los puntos deben ser reales',
            'point_changed.required' => 'Los puntos a cambiar son requeridos',
            'point_changed.numeric' => 'Los a cambiar son deben ser reales',

        ];
    }
}
