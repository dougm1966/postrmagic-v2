<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date' => 'datetime',
    ];

    /**
     * Get the validation rules for an event.
     *
     * @return array<string, mixed>
     */
    public static function validationRules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ];
    }

    /**
     * Determine if the event is upcoming.
     *
     * @return bool
     */
    public function isUpcoming(): bool
    {
        return $this->date->isFuture();
    }

    /**
     * Determine if the event is past.
     *
     * @return bool
     */
    public function isPast(): bool
    {
        return $this->date->isPast();
    }

    /**
     * Determine if the event is happening today.
     *
     * @return bool
     */
    public function isToday(): bool
    {
        return $this->date->isToday();
    }

    /**
     * Get the formatted date for display.
     *
     * @param string $format
     * @return string
     */
    public function formattedDate(string $format = 'F j, Y g:i A'): string
    {
        return $this->date->format($format);
    }

    /**
     * Get the relative time until the event.
     *
     * @return string
     */
    public function timeUntil(): string
    {
        return $this->isUpcoming() ? $this->date->diffForHumans() : 'Event has passed';
    }

    /**
     * Scope a query to only include upcoming events.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUpcoming($query)
    {
        return $query->where('date', '>=', Carbon::now());
    }

    /**
     * Scope a query to only include past events.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePast($query)
    {
        return $query->where('date', '<', Carbon::now());
    }

    /**
     * Get the media items for the event.
     */
    public function mediaItems(): HasMany
    {
        return $this->hasMany(MediaItem::class);
    }

    /**
     * Get the generated posts for the event.
     */
    public function generatedPosts(): HasMany
    {
        return $this->hasMany(GeneratedPost::class);
    }
    
    /**
     * Get the tags associated with the event.
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}