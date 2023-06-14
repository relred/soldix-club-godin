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
            'role_id' => Role::IS_ADMIN,
            'email' => 'admin@soldix.com',
            'password' => Hash::make('Morgan3z'),
        ]);
    }
}
