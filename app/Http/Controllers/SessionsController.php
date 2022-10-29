<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{

    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required']
        ]);

        if (! Auth::attempt($credentials))
        {
            throw ValidationException::withMessages([
                'email' => 'Your credentials must match our records'
            ]);
        }

        $request->session()->regenerate();
        return redirect('/')->with('success', 'You\'re now Logged in');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Goodbye!');
    }
}
