<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Product::class;

    public function definition()
    {
        return [
            'category_id' => $this->faker->randomElement([1,2,3]),
            'price' => $this->faker->numberBetween(),
            'title' => $this->faker->sentence(),
            'stock' => $this->faker->randomDigit(),
            'description' => $this->faker->paragraph(),
        ];
    }
}
