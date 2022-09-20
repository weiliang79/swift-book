<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@isp.com',
            'role_id' => Role::ROLE_ADMIN,
        ]);

        User::factory()->create([
            'username' => 'user',
            'email' => 'user@isp.com',
            'role_id' => Role::ROLE_USER,
        ]);
    }
}
