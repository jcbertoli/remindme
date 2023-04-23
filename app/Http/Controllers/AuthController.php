<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Repositories\AuthRepository;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function __construct(private AuthRepository $repository)
    {
    }

    public function login(LoginRequest $request)
    {
        $auth = $this->repository->auth($request->validated());

        if ($auth)
            return redirect()->route('dashboard');

        return redirect()->route('login')->with('message', 'Invalid username or password.')->withInput(['username']);
    }

    public function logout()
    {
        $this->repository->logout();

        return redirect()->route('login');
    }

    public function getLoginPage()
    {
        return view('login');
    }
}
