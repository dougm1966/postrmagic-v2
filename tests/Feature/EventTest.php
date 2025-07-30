<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Event;

class EventTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test to ensure events can be created.
     *
     * @return void
     */
    public function test_event_can_be_created_with_factory(): void
    {
        // Create one event using the factory
        $event = Event::factory()->create();

        // Assert that the event exists in the database
        $this->assertDatabaseHas('events', [
            'id' => $event->id,
            'title' => $event->title,
        ]);

        // Assert that there is exactly one event in the database
        $this->assertDatabaseCount('events', 1);
    }
}
