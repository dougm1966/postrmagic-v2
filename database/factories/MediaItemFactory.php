<?php

namespace Database\Factories;

use App\Models\MediaItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class MediaItemFactory extends Factory
{
    protected $model = MediaItem::class;

    public function definition(): array
    {
        return [
            'filename' => $this->faker->word() . '.' . $this->faker->randomElement(['jpg', 'png', 'pdf']),
            'path' => 'media/' . $this->faker->uuid(),
            'type' => $this->faker->randomElement(['image', 'document', 'video']),
            'size' => $this->faker->numberBetween(1000, 10000000),
            'metadata' => json_encode(['width' => 1920, 'height' => 1080]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
