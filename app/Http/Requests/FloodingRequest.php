<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FloodingRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'file' => 'required|mimes:txt|max:2048',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'file.required' => 'O arquivo é obrigatório.',
            'file.mimes' => 'O arquivo tem que ser .txt',
            'file.max' => 'O tamanho maximo do arquivo é 2mb'
        ];
    }
}
