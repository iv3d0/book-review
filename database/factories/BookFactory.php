<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence('3', true),
            'author' => $this->faker->name(),
            'genre' => $this->faker->word(),
            'image' => $this->faker->imageUrl('85', '64', 'books'),
            'created_at' => $this->faker->dateTimeBetween('-1 month'),
        ];
    }
}
