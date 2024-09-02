<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subscription;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=SubscriptionSeeder
     */
    public function run(): void
    {
        Subscription::create([
            'name' => 'Admin',
            'price' => 9999999,
            'description' => 'All features a available',
            'duration_in_days' => 9999,
            'client_quota' => -1,
            'is_active' => true,
        ]);
        Subscription::create([
            'name' => 'Trial',
            'price' => 0,
            'description' => 'Trial plan with all features',
            'duration_in_days' => 7,
            'client_quota' => -1,
            'is_active' => true,
        ]);

        Subscription::create([
            'name' => 'Basic',
            'price' => 9.99,
            'description' => 'Basic plan with limited features',
            'duration_in_days' => 31,
            'client_quota' => 20,
            'is_active' => true,
        ]);

        Subscription::create([
            'name' => 'Pro',
            'price' => 19.99,
            'description' => 'Pro plan with additional features',
            'duration_in_days' => 31,
            'client_quota' => 50,
            'is_active' => true,
        ]);

        Subscription::create([
            'name' => 'Premium',
            'price' => 29.99,
            'description' => 'Premium plan with all features',
            'duration_in_days' => 31,
            'client_quota' => -1,
            'is_active' => true,
        ]);
    }
}
