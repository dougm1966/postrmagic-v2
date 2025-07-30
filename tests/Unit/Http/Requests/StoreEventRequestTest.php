<?php

namespace Tests\Unit\Http\Requests;

use App\Http\Requests\StoreEventRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class StoreEventRequestTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test validation passes with valid data.
     */
    public function test_validation_passes_with_valid_data(): void
    {
        // Create a request instance
        $request = new StoreEventRequest();
        
        // Valid data
        $validData = [
            'title' => 'New Event Title',
            'description' => 'This is a new event description.',
            'date' => now()->addDays(5)->format('Y-m-d'),
            'location' => 'Event Location',
        ];
        
        // Get the validation rules
        $rules = $request->rules();
        
        // Create a validator instance
        $validator = Validator::make($validData, $rules);
        
        // Assert validation passes
        $this->assertFalse($validator->fails());
    }

    /**
     * Test validation fails with missing required fields.
     */
    public function test_validation_fails_with_missing_fields(): void
    {
        // Create a request instance
        $request = new StoreEventRequest();
        
        // Invalid data with missing required fields
        $invalidData = [
            'title' => 'New Event Title',
            // Missing description, date, location
        ];
        
        // Get the validation rules
        $rules = $request->rules();
        
        // Create a validator instance
        $validator = Validator::make($invalidData, $rules);
        
        // Assert validation fails
        $this->assertTrue($validator->fails());
        
        // Assert the specific fields that fail
        $this->assertTrue($validator->errors()->has('description'));
        $this->assertTrue($validator->errors()->has('date'));
        $this->assertTrue($validator->errors()->has('location'));
    }

    /**
     * Test validation fails with past date.
     */
    public function test_validation_fails_with_past_date(): void
    {
        // Create a request instance
        $request = new StoreEventRequest();
        
        // Invalid data with past date
        $invalidData = [
            'title' => 'New Event Title',
            'description' => 'This is a new event description.',
            'date' => now()->subDays(5)->format('Y-m-d'),
            'location' => 'Event Location',
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
     * Test validation fails with invalid tags.
     */
    public function test_validation_fails_with_invalid_tags(): void
    {
        // Create a request instance
        $request = new StoreEventRequest();
        
        // Invalid data with non-existent tag IDs
        $invalidData = [
            'title' => 'New Event Title',
            'description' => 'This is a new event description.',
            'date' => now()->addDays(5)->format('Y-m-d'),
            'location' => 'Event Location',
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
