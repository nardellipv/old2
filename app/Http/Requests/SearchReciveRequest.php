<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchReciveRequest extends FormRequest
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
            'dateFrom' => 'required',
            'dateEnd' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'dateFrom.required' => 'La fecha desde es requerida',
            'dateEnd.required' => 'La fecha hasta es requerida',
        ];
    }
}
