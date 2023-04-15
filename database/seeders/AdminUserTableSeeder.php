<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'laracamp@gmail.com',
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'password' => \bcrypt('laracamp@gmail.com'),
            'is_admin' => true
        ]);
    }
}
