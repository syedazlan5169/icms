<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Set the minimum and maximum dates for inception_date (last 2 years)
        $minDate = Carbon::now()->subYears(2);
        $maxDate = Carbon::now();

        // Generate inception date within the last 2 years
        $inception_date = Carbon::createFromTimestamp($this->faker->dateTimeBetween($minDate, $maxDate)->getTimestamp());
        
        // Calculate expiry, renewal, and reminder dates
        $expiry_date = $inception_date->copy()->addYear();
        $renewal_date = $inception_date->copy()->addYear()->addMonth();
        $reminder_date = $expiry_date->copy()->subMonth();
        
        // Determine the status based on the current date
        $current_date = Carbon::now();
        if ($current_date->greaterThan($expiry_date)) {
            $status = 'Done';
        } elseif ($current_date->greaterThan($reminder_date)) {
            $status = 'Expiring';
        } else {
            $status = 'Active';
        }

        return [
            'user_id'=> $this->faker->numberBetween(1, 10),
            'name' => $this->faker->name(),
            'mykad_ssm' => $this->faker->unique()->bothify('########-##-####'), // Random ID format
            'phone' => $this->faker->phoneNumber(),
            'category' => $this->faker->randomElement(['Kereta', 'Motor', 'Personal Excident', 'Medical Card']), // Replace with actual categories
            'plate' => strtoupper($this->faker->bothify('???####')), // Random vehicle plate number
            'vehicle_model' => $this->faker->word(),
            'address1' => $this->faker->streetAddress(),
            'address2' => $this->faker->secondaryAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'postcode' => $this->faker->postcode(),
            'insurance_company' => $this->faker->company(),
            'premium' => $this->faker->randomFloat(2, 1000, 10000), // Random float between 1000 and 10000
            'inception_date' => $inception_date->format('Y-m-d'),
            'expiry_date' => $expiry_date->format('Y-m-d'),
            'renewal_date' => $renewal_date->format('Y-m-d'),
            'reminder_date' => $reminder_date->format('Y-m-d'),
            'status' => $status,
        ];
    }
}
