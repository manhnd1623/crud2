<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->text(70),
            'img' => fake()->imageUrl,
            'describe' => fake()->text,
            'status' => collect([
                Post::STATUS_DRAFT,
                Post::STATUS_PUBLISHED,
            ])->random(1)[0],
        ];
    }
}
