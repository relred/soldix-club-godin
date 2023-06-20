<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'user' => 'admin',
            'role_id' => Role::IS_ADMIN,
            'is_local_admin' => 1,
            'email' => 'admin@soldix.com',
            'password' => Hash::make('Morgan3z'),
        ]);
    }
}
