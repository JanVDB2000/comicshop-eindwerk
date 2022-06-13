<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $photos = ['clean.jpg','clean1.jpg','clean2.jpg','clean3.jpg','clean4.jpg','clean5.png','DC-1.jpg','DC.jpg','marvel.jpg'];
        return [
            'file'=> $this->faker->randomElement($photos),
        ];
    }
}
