<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $brands = Brand::pluck('id')->toArray();
        $pc = ProductCategory::pluck('id')->toArray();
        $title = $this->faker->sentence($nbwords= 3, $variableNbWords=true);
        $slug = Str::slug($title,'-');
        return [
            'photo_id'=>$this->faker->numberBetween($min= 1, $max= 2),
            'brand_id'=>$this->faker->randomElement($brands),
            'product_category_id'=>$this->faker->randomElement($pc),
            'name'=>$title,
            'slug'=>$slug,
            'published_date'=>$this->faker->date,
            'writer'=>$this->faker->name,
            'penciled'=>$this->faker->name,
            'item_number'=>$this->faker->randomNumber(),
            'body'=>$this->faker->text(75),
            'price'=>$this->faker->numberBetween(15 ,65),
        ];
    }
}
