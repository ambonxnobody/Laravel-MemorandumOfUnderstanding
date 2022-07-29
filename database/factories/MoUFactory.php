<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MoU>
 */
class MoUFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->words(5, true),
            'kerjasama_id' => mt_rand(1, 9),
            'denganPihak' => $this->faker->company(),
            'waktuMulai' => $this->faker->date(),
            'waktuSelesai' => $this->faker->date('Y-m-d', '+50 years'),
            'status' => 'Berlaku',
            'textMoU' => collect($this->faker->paragraphs(mt_rand(5, 10)))->map(fn ($p) => "<p>$p</p>")->implode(''),
        ];
    }
}
