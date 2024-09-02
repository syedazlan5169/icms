<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'is_admin' => 1,
            'subscription_id' => 1,
            'subscription_end_date' => now()->addDay(999)
        ]);

        User::create([
            'name' => 'User Basic',
            'email' => 'userbasic@test.com',
            'password' => Hash::make('password'),
            'is_admin' => 0,
            'subscription_id' => 3,
            'subscription_end_date' => now()->addDay(31)
        ]);

        User::create([
            'name' => 'User Pro',
            'email' => 'userpro@test.com',
            'password' => Hash::make('password'),
            'is_admin' => 0,
            'subscription_id' => 4,
            'subscription_end_date' => now()->addDay(31)
        ]);

        User::create([
            'name' => 'User Premium',
            'email' => 'userpremium@test.com',
            'password' => Hash::make('password'),
            'is_admin' => 0,
            'subscription_id' => 5,
            'subscription_end_date' => now()->addDay(31)
        ]);
    }
}
