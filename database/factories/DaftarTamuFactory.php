<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DaftarTamu>
 */
class DaftarTamuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'instansi' => fake()->text('50'),
            'layanan' => 'Lainnya',
            'nomor_hp' => fake()->phoneNumber('12'),
            'deskripsi' => fake()->text('100')
        ];
    }
}
