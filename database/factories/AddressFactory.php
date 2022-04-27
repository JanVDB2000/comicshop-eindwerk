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
        $random = ['Mailbox 101B','Mailbox 75C','Mailbox 3A','Mailbox 7E','Mailbox 8A','Mailbox 65C'];
        return [
            'firstName' => $this->faker->name(),
            'lastName' => $this->faker->lastName(),
            'address_1' => $this->faker->streetAddress(),
            'address_2' => $this->faker->randomElement($random),
            'country' => $this->faker->country(),
            'state' => $this->faker->city(),
            'zip' => $this->faker->postcode(),
        ];
    }
}
