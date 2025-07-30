<?php

namespace Database\Seeders;

use App\Models\GeneratedPost;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class GeneratedPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Note: This seeder creates standalone generated posts not associated with events.
     * Generated posts associated with events are created in the EventSeeder.
     */
    public function run(): void
    {
        // Create standalone generated posts (not associated with events)
        // Mix of draft, scheduled, and published posts
        
        // Draft posts
        GeneratedPost::factory(5)->create([
            'event_id' => null,
            'status' => 'draft',
            'scheduled_at' => null,
        ]);
        
        // Scheduled posts
        GeneratedPost::factory(5)->create([
            'event_id' => null,
            'status' => 'scheduled',
            'scheduled_at' => fn() => Carbon::now()->addDays(rand(1, 14)),
        ]);
        
        // Published posts
        GeneratedPost::factory(5)->create([
            'event_id' => null,
            'status' => 'published',
            'scheduled_at' => null,
        ]);
    }
}
