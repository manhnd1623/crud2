<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use function Laravel\Prompts\text;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'img' => fake() -> imageUrl(),
            'name' => fake() -> text() ,
            'date' => fake() -> text() ,
            'mail' => fake() -> text(),
            'phone' => fake() -> text(),
            'country' => fake() -> text(),
            'order' => fake() -> text(),
        ];
    }
}
