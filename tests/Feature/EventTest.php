<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Event;
use App\Models\MediaItem;
use App\Models\GeneratedPost;
use Carbon\Carbon;

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

    /**
     * Test that events can be created with fillable attributes.
     *
     * @return void
     */
    public function test_event_can_be_created_with_fillable_attributes(): void
    {
        $eventData = [
            'title' => 'Test Event',
            'description' => 'This is a test event description',
            'date' => '2025-08-15 14:00:00',
            'location' => 'Test Location',
        ];

        $event = Event::create($eventData);

        $this->assertDatabaseHas('events', [
            'title' => 'Test Event',
            'description' => 'This is a test event description',
            'location' => 'Test Location',
        ]);

        // Check that the date was cast correctly
        $this->assertInstanceOf(Carbon::class, $event->date);
        $this->assertEquals('2025-08-15 14:00:00', $event->date->format('Y-m-d H:i:s'));
    }

    /**
     * Test the isUpcoming method.
     *
     * @return void
     */
    public function test_is_upcoming_method(): void
    {
        // Create an event in the future
        $futureEvent = Event::factory()->create([
            'date' => Carbon::now()->addDays(5),
        ]);

        // Create an event in the past
        $pastEvent = Event::factory()->create([
            'date' => Carbon::now()->subDays(5),
        ]);

        $this->assertTrue($futureEvent->isUpcoming());
        $this->assertFalse($pastEvent->isUpcoming());
    }

    /**
     * Test the isPast method.
     *
     * @return void
     */
    public function test_is_past_method(): void
    {
        // Create an event in the future
        $futureEvent = Event::factory()->create([
            'date' => Carbon::now()->addDays(5),
        ]);

        // Create an event in the past
        $pastEvent = Event::factory()->create([
            'date' => Carbon::now()->subDays(5),
        ]);

        $this->assertFalse($futureEvent->isPast());
        $this->assertTrue($pastEvent->isPast());
    }

    /**
     * Test the isToday method.
     *
     * @return void
     */
    public function test_is_today_method(): void
    {
        // Create an event for today
        $todayEvent = Event::factory()->create([
            'date' => Carbon::today()->addHours(3),
        ]);

        // Create an event for tomorrow
        $tomorrowEvent = Event::factory()->create([
            'date' => Carbon::tomorrow(),
        ]);

        $this->assertTrue($todayEvent->isToday());
        $this->assertFalse($tomorrowEvent->isToday());
    }

    /**
     * Test the formattedDate method.
     *
     * @return void
     */
    public function test_formatted_date_method(): void
    {
        $date = Carbon::create(2025, 8, 15, 14, 30, 0);
        $event = Event::factory()->create([
            'date' => $date,
        ]);

        $this->assertEquals('August 15, 2025 2:30 PM', $event->formattedDate());
        $this->assertEquals('2025-08-15', $event->formattedDate('Y-m-d'));
    }

    /**
     * Test the upcoming scope.
     *
     * @return void
     */
    public function test_upcoming_scope(): void
    {
        // Create events in the past and future
        Event::factory()->create(['date' => Carbon::now()->subDays(5)]);
        Event::factory()->create(['date' => Carbon::now()->subDays(1)]);
        Event::factory()->create(['date' => Carbon::now()->addDays(1)]);
        Event::factory()->create(['date' => Carbon::now()->addDays(5)]);

        $upcomingEvents = Event::upcoming()->get();

        $this->assertEquals(2, $upcomingEvents->count());
        foreach ($upcomingEvents as $event) {
            $this->assertTrue($event->isUpcoming());
        }
    }

    /**
     * Test the past scope.
     *
     * @return void
     */
    public function test_past_scope(): void
    {
        // Create events in the past and future
        Event::factory()->create(['date' => Carbon::now()->subDays(5)]);
        Event::factory()->create(['date' => Carbon::now()->subDays(1)]);
        Event::factory()->create(['date' => Carbon::now()->addDays(1)]);
        Event::factory()->create(['date' => Carbon::now()->addDays(5)]);

        $pastEvents = Event::past()->get();

        $this->assertEquals(2, $pastEvents->count());
        foreach ($pastEvents as $event) {
            $this->assertTrue($event->isPast());
        }
    }

    /**
     * Test the relationship with media items.
     *
     * @return void
     */
    public function test_event_has_many_media_items(): void
    {
        $event = Event::factory()->create();
        
        // Create media items associated with the event using the forEvent method
        MediaItem::factory()->count(3)->forEvent($event)->create();

        $this->assertCount(3, $event->mediaItems);
        $this->assertInstanceOf(MediaItem::class, $event->mediaItems->first());
    }

    /**
     * Test the relationship with generated posts.
     *
     * @return void
     */
    public function test_event_has_many_generated_posts(): void
    {
        $event = Event::factory()->create();
        
        // Create generated posts associated with the event using the forEvent method
        GeneratedPost::factory()->count(2)->forEvent($event)->create();

        $this->assertCount(2, $event->generatedPosts);
        $this->assertInstanceOf(GeneratedPost::class, $event->generatedPosts->first());
    }
}
