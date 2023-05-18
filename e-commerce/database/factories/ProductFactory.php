<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = Category::pluck('id')->toArray();
       $name  =  $this->faker->text(25);
       $price =  $this->faker->numberBetween($min = 100, $max= 900);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(100),
            'image_name'  => $this->faker->imageUrl($width = 200, $height = 300), 
            'price'  => $price, 
            'sale_price'  => $price - 50, 
            'category_id'  => $this->faker->randomElement($categories) 
        ];
    }
}
