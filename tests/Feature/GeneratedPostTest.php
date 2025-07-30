<?php

namespace Tests\Feature;

use App\Models\GeneratedPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GeneratedPostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function generated_post_can_be_created_with_factory()
    {
        $generatedPost = GeneratedPost::factory()->create();

        $this->assertDatabaseHas('generated_posts', [
            'id' => $generatedPost->id,
        ]);
    }
}
