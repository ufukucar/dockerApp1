<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'categoryId' => random_int(1,10),
            'name' => fake()->words(5),
            'unitPrice' => fake()->randomFloat(2),
            'stock' => random_int(1,200),

        ];
    }
}
