<?php

namespace Tests\Feature\API;

use App\Models\Event;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test listing events.
     */
    public function test_can_list_events(): void
    {
        // Create some test events
        Event::factory()->count(5)->create();

        // Make the API request
        $response = $this->getJson('/api/v1/events');

        // Assert successful response with the correct structure
        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'title',
                        'description',
                        'date',
                        'location',
                        'created_at',
                        'updated_at',
                    ]
                ],
                'links',
                'meta',
            ]);
    }

    /**
     * Test creating a new event.
     */
    public function test_can_create_event(): void
    {
        // Create test data
        $eventData = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'date' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'location' => $this->faker->address,
        ];

        // Make the API request
        $response = $this->postJson('/api/v1/events', $eventData);

        // Assert successful response and data was saved
        $response->assertStatus(201)
            ->assertJsonFragment([
                'title' => $eventData['title'],
                'description' => $eventData['description'],
                'location' => $eventData['location'],
            ]);

        // Verify the event exists in the database
        $this->assertDatabaseHas('events', [
            'title' => $eventData['title'],
        ]);
    }

    /**
     * Test showing a specific event.
     */
    public function test_can_show_event(): void
    {
        // Create a test event
        $event = Event::factory()->create();

        // Make the API request
        $response = $this->getJson("/api/v1/events/{$event->id}");

        // Assert successful response with the correct data
        $response->assertStatus(200)
            ->assertJsonFragment([
                'id' => $event->id,
                'title' => $event->title,
                'description' => $event->description,
                'location' => $event->location,
            ]);
    }

    /**
     * Test updating an event.
     */
    public function test_can_update_event(): void
    {
        // Create a test event
        $event = Event::factory()->create();

        // Update data
        $updateData = [
            'title' => 'Updated Title',
            'description' => 'Updated description',
        ];

        // Make the API request
        $response = $this->putJson("/api/v1/events/{$event->id}", $updateData);

        // Assert successful response with updated data
        $response->assertStatus(200)
            ->assertJsonFragment($updateData);

        // Verify the event was updated in the database
        $this->assertDatabaseHas('events', [
            'id' => $event->id,
            'title' => 'Updated Title',
            'description' => 'Updated description',
        ]);
    }

    /**
     * Test deleting an event.
     */
    public function test_can_delete_event(): void
    {
        // Create a test event
        $event = Event::factory()->create();

        // Make the API request
        $response = $this->deleteJson("/api/v1/events/{$event->id}");

        // Assert successful response
        $response->assertStatus(204);

        // Verify the event was deleted from the database
        $this->assertDatabaseMissing('events', [
            'id' => $event->id,
        ]);
    }

    /**
     * Test filtering events by date range.
     */
    public function test_can_filter_events_by_date_range(): void
    {
        // Create events with different dates
        $pastEvent = Event::factory()->create(['date' => now()->subDays(10)]);
        $futureEvent = Event::factory()->create(['date' => now()->addDays(10)]);
        
        // Filter for future events
        $startDate = now();
        $endDate = now()->addDays(20);
        
        // Make the API request
        $response = $this->getJson("/api/v1/events?start_date={$startDate->toDateString()}&end_date={$endDate->toDateString()}");
        
        // Assert only future event is included
        $response->assertStatus(200)
            ->assertJsonFragment(['id' => $futureEvent->id])
            ->assertJsonMissing(['id' => $pastEvent->id]);
    }

    /**
     * Test syncing tags for an event.
     */
    public function test_can_sync_tags(): void
    {
        // Create a test event and tags
        $event = Event::factory()->create();
        $tags = Tag::factory()->count(3)->create();
        
        // Make the API request to sync tags
        $response = $this->postJson("/api/v1/events/{$event->id}/tags", [
            'tags' => $tags->pluck('id')->toArray(),
        ]);
        
        // Assert successful response
        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Tags synchronized successfully',
            ]);
        
        // Verify tags were attached to the event
        foreach ($tags as $tag) {
            $this->assertDatabaseHas('event_tag', [
                'event_id' => $event->id,
                'tag_id' => $tag->id,
            ]);
        }
    }
}
