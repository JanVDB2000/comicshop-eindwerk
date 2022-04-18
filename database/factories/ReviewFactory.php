<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::pluck('id')->toArray();
        $products = Product::pluck('id')->toArray();
        return [
        'user_id'=>$this->faker->randomElement($users),
        'product_id'=>$this->faker->randomElement($products),
        'description'=>$this->faker->realText(200,2),
        'stars'=>$this->faker->numberBetween(1,5),
        ];
    }
}
