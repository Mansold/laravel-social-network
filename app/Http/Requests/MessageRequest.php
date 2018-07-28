<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'message' =>  ['required', 'max:250']
        ];
    }

    public function messages()
    {
        return [
            'message.required' => 'Por favor, escribe un mensaje',
            'message.max' => 'El mensaje no puede superar los 250 caracteres'
        ];
    }
}
