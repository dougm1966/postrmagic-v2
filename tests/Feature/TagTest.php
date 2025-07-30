<?php

namespace Tests\Feature;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TagTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function tag_can_be_created_with_factory()
    {
        $tag = Tag::factory()->create();

        $this->assertDatabaseHas('tags', [
            'id' => $tag->id,
        ]);
    }
}
