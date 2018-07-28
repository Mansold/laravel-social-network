<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Message;
use App\Http\Requests\MessageRequest;

class MessagesController extends Controller
{
    public function show(Message $message)
    {
        //$message = Message::find($id);

        return view('messages.show',[
            'message' => $message
        ]);
    }

    public function create(MessageRequest $request)
    {
        return '';
    }
}
