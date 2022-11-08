<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\UserService;

class SessionsController extends Controller
{

    public function __construct(public UserService $user)
    {
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store(LoginRequest $request)
    {
        return $this->user->login($request);
    }

    public function destroy()
    {
        return $this->user->logout();
    }
}
