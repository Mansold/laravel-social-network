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
        $user = $request->user();

        $message = Message::create([
            'user_id' => $user->id,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => 'http://placeimg.com/600/400?'.mt_rand(0,1000)
        ]);

        return redirect('/messages/' . $message->id);
    }
}
