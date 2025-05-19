<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [[
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'role_id' => Role::ADMINISTRADOR
        ],
        [
            'name' => 'Test',
            'email' => 'test@test.com',
            'password' => bcrypt('password'),
            'role_id' => Role::CLIENTE
        ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
