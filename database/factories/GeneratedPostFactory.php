<?php

namespace Database\Factories;

use App\Models\GeneratedPost;
use Illuminate\Database\Eloquent\Factories\Factory;

class GeneratedPostFactory extends Factory
{
    protected $model = GeneratedPost::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraphs(3, true),
            'status' => $this->faker->randomElement(['draft', 'published', 'scheduled']),
            'scheduled_at' => $this->faker->dateTimeBetween('now', '+1 month'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
