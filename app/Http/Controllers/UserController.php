<?php

namespace App\Http\Controllers;

use App\Enum\RoleEnum;
use App\Http\Requests\ChangePasswordUserRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\DeleteUserRequest;
use App\Http\Requests\LoginRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Str;

class UserController extends Controller
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function changePassword(ChangePasswordUserRequest $request)
    {
        $changePassword = $this->repository->changePassword(Auth()->user()->id, $request->validated());
    
        if(!$changePassword)
            return redirect()->route('dashboard.changePassword')->with('errors', 'Could not change password.');
    
        return redirect()->route('dashboard')->with('message', 'Password changed!');
    }

}
