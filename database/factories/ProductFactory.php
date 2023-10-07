<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

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
    protected $model = Product::class;

    public function definition(): array
    {
        $faker = Faker::create();
        return [
            'category_id' => function () {
                return Category::inRandomOrder()->first()->id;
            },
            'product_name' => $faker->word,
            'product_price' => $faker->randomDigit,
            'product_image' => $faker->imageUrl($width = 200, $height = 200),
            'product_description' => $faker->sentence,
            'product_quantity' => $faker->randomDigit,
        ];
    }
}
