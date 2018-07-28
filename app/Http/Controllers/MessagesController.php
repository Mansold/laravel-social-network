<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Message;

class MessagesController extends Controller
{
    public function show(Message $message)
    {
        //$message = Message::find($id);

        return view('messages.show',[
            'message' => $message
        ]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'message' =>  ['required', 'max:250']
        ],
        [
            'message.required' => 'Por favor, escribe un mensaje',
            'message.max' => 'El mensaje no puede superar los 250 caracteres'
        ]);
    }
}
