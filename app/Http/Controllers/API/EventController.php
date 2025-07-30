<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Http\Resources\EventCollection;
use App\Http\Resources\EventResource;
use App\Http\Resources\MediaItemResource;
use App\Http\Resources\GeneratedPostResource;
use App\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\Resources\Json\ResourceCollection;

class EventController extends Controller
{
    /**
     * Display a listing of the events.
     */
    public function index(Request $request): EventCollection
    {
        $query = Event::query();
        
        // Filter by date range if provided
        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }
        
        // Filter by location if provided
        if ($request->has('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }
        
        // Filter by search term (searches in title and description)
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }
        
        // Sort by date (default) or other fields
        $sortBy = $request->input('sort_by', 'date');
        $sortOrder = $request->input('sort_order', 'asc');
        $query->orderBy($sortBy, $sortOrder);
        
        // Paginate the results
        $perPage = $request->input('per_page', 15);
        $events = $query->paginate($perPage);
        
        return new EventCollection($events);
    }

    /**
     * Store a newly created event in storage.
     */
    public function store(StoreEventRequest $request): JsonResponse
    {
        $event = Event::create($request->validated());
        
        // Attach tags if provided
        if ($request->has('tags')) {
            $event->tags()->attach($request->tags);
        }
        
        return (new EventResource($event))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified event.
     */
    public function show(Event $event): EventResource
    {
        // Load relationships
        $event->load(['mediaItems', 'generatedPosts', 'tags']);
        
        return new EventResource($event);
    }

    /**
     * Update the specified event in storage.
     */
    public function update(UpdateEventRequest $request, Event $event): EventResource
    {
        $event->update($request->validated());
        
        // Sync tags if provided
        if ($request->has('tags')) {
            $event->tags()->sync($request->tags);
        }
        
        return new EventResource($event);
    }

    /**
     * Remove the specified event from storage.
     */
    public function destroy(Event $event): JsonResponse
    {
        $event->delete();
        
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * Get all media items associated with an event.
     */
    public function getEventMedia(Event $event): ResourceCollection
    {
        $mediaItems = $event->mediaItems()->paginate(15);
        return MediaItemResource::collection($mediaItems);
    }

    /**
     * Get all generated posts associated with an event.
     */
    public function getEventPosts(Event $event): ResourceCollection
    {
        $posts = $event->generatedPosts()->paginate(15);
        return GeneratedPostResource::collection($posts);
    }

    /**
     * Sync tags for an event.
     */
    public function syncTags(Request $request, Event $event): JsonResponse
    {
        $validated = $request->validate([
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id',
        ]);

        $event->tags()->sync($validated['tags']);
        
        return response()->json([
            'message' => 'Tags synchronized successfully',
            'tags' => $event->tags,
        ]);
    }
}
