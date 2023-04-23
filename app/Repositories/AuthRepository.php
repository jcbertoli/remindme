<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;

class AuthRepository
{
    public function auth(array $data)
    {
        return Auth::attempt($data);
    }

    public function logout()
    {
        return Auth::logout();
    }
}
