<?php

namespace Tests\Unit\Http\Requests;

use App\Http\Requests\UpdateEventRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class UpdateEventRequestTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test validation passes with valid data.
     */
    public function test_validation_passes_with_valid_data(): void
    {
        // Create a request instance
        $request = new UpdateEventRequest();
        
        // Valid data
        $validData = [
            'title' => 'Updated Event Title',
            'description' => 'This is an updated event description.',
            'date' => now()->addDays(5)->format('Y-m-d'),
            'location' => 'Updated Location',
        ];
        
        // Get the validation rules
        $rules = $request->rules();
        
        // Create a validator instance
        $validator = Validator::make($validData, $rules);
        
        // Assert validation passes
        $this->assertFalse($validator->fails());
    }

    /**
     * Test validation fails with invalid date.
     */
    public function test_validation_fails_with_past_date(): void
    {
        // Create a request instance
        $request = new UpdateEventRequest();
        
        // Invalid data with past date
        $invalidData = [
            'title' => 'Updated Event Title',
            'description' => 'This is an updated event description.',
            'date' => now()->subDays(5)->format('Y-m-d'),
            'location' => 'Updated Location',
        ];
        
        // Get the validation rules
        $rules = $request->rules();
        
        // Create a validator instance
        $validator = Validator::make($invalidData, $rules);
        
        // Assert validation fails
        $this->assertTrue($validator->fails());
        
        // Assert the specific field that fails
        $this->assertTrue($validator->errors()->has('date'));
    }

    /**
     * Test validation passes with partial data.
     */
    public function test_validation_passes_with_partial_data(): void
    {
        // Create a request instance
        $request = new UpdateEventRequest();
        
        // Partial data (only updating title)
        $partialData = [
            'title' => 'Only Update Title',
        ];
        
        // Get the validation rules
        $rules = $request->rules();
        
        // Create a validator instance
        $validator = Validator::make($partialData, $rules);
        
        // Assert validation passes
        $this->assertFalse($validator->fails());
    }

    /**
     * Test validation fails with invalid tags.
     */
    public function test_validation_fails_with_invalid_tags(): void
    {
        // Create a request instance
        $request = new UpdateEventRequest();
        
        // Invalid data with non-existent tag IDs
        $invalidData = [
            'title' => 'Updated Event Title',
            'tags' => [999, 1000], // Non-existent tag IDs
        ];
        
        // Get the validation rules
        $rules = $request->rules();
        
        // Create a validator instance
        $validator = Validator::make($invalidData, $rules);
        
        // Assert validation fails
        $this->assertTrue($validator->fails());
        
        // Assert the specific field that fails
        $this->assertTrue($validator->errors()->has('tags.0'));
    }
}
