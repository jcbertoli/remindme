<?php

namespace App\Repositories;

use App\Jobs\UserCreatedMail;
use App\Models\User;
use Illuminate\Support\Str;

class UserRepository
{
    public function create(array $data): User|null
    {
        $data['password'] = Str::random(12);

        $user = User::create($data);

        if ($user)
            UserCreatedMail::dispatch($data);

        return $user;
    }

    public function update(int $id, array $data): bool|null
    {
        $user = $this->findById($id);

        if (!$user)
            return null;

        return $user->update($data);
    }

    public function changePassword(int $id, array $data): User|null
    {
        $user = $this->findById($id);

        $user->password = $data['password'];
        $user->must_change_password = false;

        $user->save();

        return $user;
    }

    public function findById($id): User|null
    {
        return User::find($id);
    }

    public function deleteById(int $id): bool|null
    {
        $user = $this->findById($id);

        if (!$user)
            return null;

        $user->delete();
    }

    public function paginate(int $amount = 10)
    {
        return User::paginate($amount);
    }
}
