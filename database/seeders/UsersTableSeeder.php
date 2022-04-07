<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('Admin@123'),
            'role' => 'Admin',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
