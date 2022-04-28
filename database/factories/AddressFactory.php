<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstName' => $this->faker->name(),
            'lastName' => $this->faker->lastName(),
            'address_1' => $this->faker->streetAddress(),
            'country' => $this->faker->country(),
            'state' => $this->faker->city(),
            'zip' => $this->faker->postcode(),
        ];
    }
}
