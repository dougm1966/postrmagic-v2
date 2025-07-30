<?php

namespace Database\Seeders;

use App\Models\MediaItem;
use Illuminate\Database\Seeder;

class MediaItemSeeder extends Seeder
{
    public function run(): void
    {
        MediaItem::factory(20)->create();
    }
}
