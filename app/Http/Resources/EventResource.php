<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'date' => $this->date->toIso8601String(),
            'location' => $this->location,
            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String(),
            // Include relationships when loaded
            'media_items' => MediaItemResource::collection($this->whenLoaded('mediaItems')),
            'generated_posts' => GeneratedPostResource::collection($this->whenLoaded('generatedPosts')),
            'tags' => TagResource::collection($this->whenLoaded('tags')),
        ];
    }
}
