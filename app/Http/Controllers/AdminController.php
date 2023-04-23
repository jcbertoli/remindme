<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\DeleteUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;

class AdminController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->paginate(10);

        return view('dashboard.admin.index', compact('users'));
    }

    public function createUser(CreateUserRequest $request)
    {
        $user = $this->userRepository->create($request->validated());

        if (!$user)
            return redirect()->route('admin.index')->with('showCreateUserModal', true)->with('errors', 'Could not create user.')->withInput();

        return redirect()->route('admin.index')->with('showCreateUserModal', true)->with('createUserMessage', 'User successfully created')->withInput();
    }

    public function editUser($id)
    {
        $user = $this->userRepository->findById($id);

        return view('dashboard.admin.editUser', compact('user'));
    }

    public function updateUser(UpdateUserRequest $request)
    {
        return $this->userRepository->update($request->id, $request->validated());
    }

    public function deleteUser(DeleteUserRequest $request)
    {
        return $this->userRepository->deleteById($request->validated());
    }

    public function listUserWebhooks($id)
    {
        $webhooks = $this->userRepository->findById($id)->webhooks()->paginate(10);

        return view('dashboard.admin.listUserWebhooks', compact('webhooks'));
    }
}
