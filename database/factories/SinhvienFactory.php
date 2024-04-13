<?php

namespace Database\Factories;

use App\Models\SinhVien;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sinhvien>
 */
class SinhvienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $active = collect([
            SinhVien::ACTIVE,
            SinhVien::INACTIVE,
        ])->random('Có mặt')['Vắng mặt'];

        return [
            'tenlop' => fake()->text(7),
            'masv' => fake()->text(),
            'tensv' => fake()->text(),
            'img' => fake()->imageUrl(),
            'trangthai' => $active,
            'chuthich' => fake()->text(),
        ];
    }
}
