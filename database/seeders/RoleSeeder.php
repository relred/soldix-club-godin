<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'user']);
        Role::create(['name' => 'cashier']);
        Role::create(['name' => 'corporate']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'developer']);
    }
}
