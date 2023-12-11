<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first(); // Retrieve a random user

        return [
            'user_id' => $user->id,
            'address_line_1' => $this->faker->address(),
            'address_line_2' => null,
            'city' => $this->faker->city(),
            'postal_code' => $this->faker->postcode(),
            'state' => $this->faker->state(),
            'country' => $this->faker->country(),
            'type' => 1,
        ];
    }
}
