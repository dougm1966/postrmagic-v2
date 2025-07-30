<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\MediaItem;
use App\Models\GeneratedPost;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create past events (5)
        $pastEvents = Event::factory()
            ->count(5)
            ->create([
                'date' => fn () => Carbon::now()->subDays(rand(1, 30)),
            ]);

        // Create today's events (2)
        $todayEvents = Event::factory()
            ->count(2)
            ->create([
                'date' => fn () => Carbon::today()->addHours(rand(1, 23)),
            ]);

        // Create upcoming events (8)
        $upcomingEvents = Event::factory()
            ->count(8)
            ->create([
                'date' => fn () => Carbon::now()->addDays(rand(1, 60)),
            ]);

        // Combine all events
        $allEvents = $pastEvents->concat($todayEvents)->concat($upcomingEvents);

        // For each event, create 1-5 media items
        $allEvents->each(function ($event) {
            // Create 1-5 media items for this event
            MediaItem::factory()
                ->count(rand(1, 5))
                ->forEvent($event)
                ->create();

            // Create 0-3 generated posts for this event
            // Past events are more likely to have posts
            $postCount = $event->isPast() ? rand(1, 3) : rand(0, 2);
            
            if ($postCount > 0) {
                GeneratedPost::factory()
                    ->count($postCount)
                    ->forEvent($event)
                    ->create([
                        // Past events have published posts, upcoming have drafts or scheduled
                        'status' => $event->isPast() 
                            ? 'published' 
                            : ($event->isToday() 
                                ? (rand(0, 1) ? 'published' : 'scheduled') 
                                : (rand(0, 1) ? 'draft' : 'scheduled')),
                        'scheduled_at' => $event->isUpcoming() ? $event->date->copy()->subDays(rand(1, 7)) : null,
                    ]);
            }
        });
    }
}
