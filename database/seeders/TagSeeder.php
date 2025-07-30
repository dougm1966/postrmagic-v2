<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Creates a set of predefined tags commonly used for social media content
     * as well as some randomly generated tags.
     */
    public function run(): void
    {
        // Common social media content tags
        $predefinedTags = [
            // Event types
            'conference', 'workshop', 'webinar', 'meetup', 'launch', 
            'networking', 'seminar', 'exhibition', 'fundraiser', 'celebration',
            
            // Content categories
            'marketing', 'technology', 'business', 'design', 'education',
            'health', 'finance', 'entertainment', 'travel', 'food',
            
            // Content types
            'announcement', 'update', 'tutorial', 'guide', 'review',
            'interview', 'case-study', 'behind-the-scenes', 'tips', 'insights',
            
            // Engagement tags
            'trending', 'mustread', 'featured', 'exclusive', 'breaking',
            'popular', 'viral', 'spotlight', 'recommended', 'top-picks'
        ];
        
        // Create predefined tags
        foreach ($predefinedTags as $tagName) {
            Tag::create([
                'name' => $tagName,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
        // Create some random tags to supplement the predefined ones
        Tag::factory(10)->create();
    }
}
