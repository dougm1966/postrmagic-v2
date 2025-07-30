<?php

namespace Database\Seeders;

use App\Models\MediaItem;
use Illuminate\Database\Seeder;

class MediaItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Note: This seeder creates standalone media items not associated with events.
     * Media items associated with events are created in the EventSeeder.
     */
    public function run(): void
    {
        // Create standalone media items (not associated with events)
        MediaItem::factory(10)->create([
            'event_id' => null,
        ]);
    }
}
