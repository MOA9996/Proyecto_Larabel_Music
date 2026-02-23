<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlbumFactory extends Factory
{
    protected $model = Album::class;

    public function definition(): array
    {
        return [
            'titulo'           => $this->faker->sentence(3),
            'artista'          => $this->faker->name(),
            'genero'           => $this->faker->randomElement(['Rock', 'Pop', 'Jazz', 'Hip-Hop', 'Clásica', 'Electrónica']),
            'discografica'     => $this->faker->company(),
            'formato'          => $this->faker->randomElement(['CD', 'Vinilo', 'Cassette', 'Digital']),
            'anio'             => $this->faker->numberBetween(1900, date('Y')),
            'numero_pistas'    => $this->faker->numberBetween(1, 20),
            'duracion_total'   => $this->faker->numberBetween(20, 120),
            'portada'          => null,
            'user_id'          => null,
        ];
    }
}
