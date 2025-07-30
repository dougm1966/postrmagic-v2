<?php

namespace Database\Factories;

use App\Models\Event;
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
            'event_id' => null,
        ];
    }

    /**
     * Configure the factory to associate the generated post with an event.
     *
     * @param Event|null $event
     * @return $this
     */
    public function forEvent(?Event $event = null): self
    {
        return $this->state(function (array $attributes) use ($event) {
            return [
                'event_id' => $event ? $event->id : Event::factory(),
            ];
        });
    }
}
