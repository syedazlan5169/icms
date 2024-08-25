<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'user_id'=> $this->faker->numberBetween(1, 5),
            'name' => $this->faker->name(),
            'mykad_ssm' => $this->faker->unique()->bothify('########-##-####'), // Random ID format
            'phone' => $this->faker->phoneNumber(),
            'category' => $this->faker->randomElement(['Personal', 'Commercial']), // Replace with actual categories
            'plate' => strtoupper($this->faker->bothify('??? ####')), // Random vehicle plate number
            'vehicle_model' => $this->faker->word(),
            'address1' => $this->faker->streetAddress(),
            'address2' => $this->faker->secondaryAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'postcode' => $this->faker->postcode(),
            'insurance_company' => $this->faker->company(),
            'premium' => $this->faker->randomFloat(2, 1000, 10000), // Random float between 1000 and 10000
            'inception_date' => $this->faker->date(),
            'expiry_date' => $this->faker->date(),
            'renewal_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['Active', 'Expiring', 'Done']),
        ];
    }
}
