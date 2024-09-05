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
            'phone' => fake()->phoneNumber(),
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'is_admin' => 1,
            'subscription_id' => 1,
            'subscription_start_date' => now(),
            'subscription_end_date' => now()->addDays(999)
        ]);

        User::create([
            'name' => 'User Basic',
            'phone' => fake()->phoneNumber(),
            'email' => 'userbasic@test.com',
            'password' => Hash::make('password'),
            'is_admin' => 0,
            'subscription_id' => 3,
            'subscription_start_date' => now(),
            'subscription_end_date' => now()->addDays(31)
        ]);

        User::create([
            'name' => 'User Pro',
            'phone' => fake()->phoneNumber(),
            'email' => 'userpro@test.com',
            'password' => Hash::make('password'),
            'is_admin' => 0,
            'subscription_id' => 4,
            'subscription_start_date' => now(),
            'subscription_end_date' => now()->addDays(31)
        ]);

        User::create([
            'name' => 'User Premium',
            'phone' => fake()->phoneNumber(),
            'email' => 'userpremium@test.com',
            'password' => Hash::make('password'),
            'is_admin' => 0,
            'subscription_id' => 5,
            'subscription_start_date' => now(),
            'subscription_end_date' => now()->addDays(31)
        ]);
    }
}
