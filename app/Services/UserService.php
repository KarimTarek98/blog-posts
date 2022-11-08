<?php

namespace App\Services;
use App\Traits\ThrowableException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserService
{
    use ThrowableException;
    public function login($request)
    {
        if (! Auth::attempt($request->validated()))
        {
            return $this->throwValidationException('Your credentials must match our records');
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
