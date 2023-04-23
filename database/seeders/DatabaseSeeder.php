<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enum\RoleEnum;
use App\Models\Reminder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'username' => 'dinho',
            'email' => 'dinhohvh@gmail.com',
            'role' => RoleEnum::Admin,
            'password' => 'teste123456',
            'discord_id' => '275407931728461824'
        ]);

        //  Reminder::factory(10)->create();
    }
}
