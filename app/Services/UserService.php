<?php

namespace App\Services;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserService
{
    public function login($request)
    {
        if (! Auth::attempt($request->validated()))
        {
            throw ValidationException::withMessages([
                'email' => 'Your credentials must match our records'
            ]);
        }

        $request->session()->regenerate();
        return redirect('/')->with('success', 'You\'re now Logged in');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Goodbye!');
    }
}
