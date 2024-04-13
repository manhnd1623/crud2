<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $active = collect([
            Category::ACTIVE,
            Category::INACTIVE,
        ])->random(1)[0];

        return [
            'name' => fake()-> text (45),
            'img' => fake()-> imageUrl,
            'excerpt' => fake()->text,
            'is_active' => $active,
        ];
    }
}
