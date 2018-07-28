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
            'title' =>  ['required', 'max:80'],
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Por favor, escribe un titulo para el mensaje',
            'title.max' => 'El titulo no puede superar los 80 caracteres',
            'content.required' => 'El mensaje es obligatorio'
        ];
    }
}
