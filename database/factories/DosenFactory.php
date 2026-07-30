<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dosen>
 */
class DosenFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nip' => fake()->unique()->numerify('1987########'),
            'nama' => fake()->name(),
            'prodi' => fake()->randomElement([
                'Teknik Informatika',
                'Sistem Informasi',
                'Teknik Elektro',
                'Teknik Sipil',
                'Manajemen',
            ]),
            'fakultas' => fake()->randomElement([
                'Fakultas Ilmu Komputer Dan Sains',
                'Fakultas Ekonomi',
                'Fakultas Hukum',
                'Fakultas Pertanian',
            ]),
            'email' => fake()->unique()->safeEmail(),
            'alamat' => fake()->address(),
            'no_telepon' => '08' . fake()->numerify('##########'),
        ];
    }
}
