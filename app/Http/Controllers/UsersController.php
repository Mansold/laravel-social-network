<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function show($username)
    {
        $user = $this->findByUsername($username);
        if($user) {
            $messages = $user->messages()->paginate(10);
        } else {
            $messages = '';
        }

        return view('users.show', [
            'user' => $user,
            'messages' => $messages,
        ]);
    }

    public function follow($username, Request $request)
    {
        $user = $this->findByUsername($username);
        $logged = $request->user();
        $logged->follows()->attach($user);

        return redirect('/'.$username)->withSuccess('Ahora sigues a este usuario');
    }

    public function unfollow($username, Request $request)
    {
        $user = $this->findByUsername($username);
        $logged = $request->user();
        $logged->follows()->detach($user);

        return redirect('/'.$username)->withSuccess('Ya no sigues a este usuario');
    }

    public function follows($username)
    {
        $user = $this->findByUsername($username);
        return view('users.follows', [
            'user' => $user,
            'follows' => $user->follows,
        ]);
    }

    public function followers($username)
    {
        $user = $this->findByUsername($username);
        return view('users.follows', [
            'user' => $user,
            'follows' => $user->followers,
        ]);
    }

    private function findByUsername($username)
    {
        return User::where('username', $username)->first();
    }
}
