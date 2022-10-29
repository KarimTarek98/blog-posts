<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'min:8', 'max:255'],
            'username' => ['required', 'unique:users,username', 'min:6', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'max:20', 'confirmed'],
            'password_confirmation' => ['required', 'same:password']
        ]);

        $user = User::create($attributes);
        Auth::login($user);

        return redirect('/')->with('success', 'You have been registerd successfully');
    }
}
