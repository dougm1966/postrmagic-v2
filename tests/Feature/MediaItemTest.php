<?php

namespace Tests\Feature;

use App\Models\MediaItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MediaItemTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function media_item_can_be_created_with_factory()
    {
        $mediaItem = MediaItem::factory()->create();

        $this->assertDatabaseHas('media_items', [
            'id' => $mediaItem->id,
        ]);
    }
}
