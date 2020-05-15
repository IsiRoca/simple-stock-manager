<?php

namespace App\Models;

use App\Concern\Likeable;
use App\Scopes\PostedScope;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Company extends Model
{
    use Likeable;
    protected $table = 'companies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_id',
        'country_id',
        'city_id',
        'name',
        'description',
        'address',
        'email',
        'phone',
        'contact_person',
        'notes',
        'posted_at',
        'thumbnail_id',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'posted_at'
    ];

    /**
     * The "booting" method of the model.
     */
    protected static function boot(): void
    {
        parent::boot();
        static::addGlobalScope(new PostedScope);
    }

    /**
     * Prepare a date for array / JSON serialization.
     */
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * Scope a query to search companies
     */
    public function scopeSearch(Builder $query, ?string $search)
    {
        if ($search) {
            return $query->where('name', 'LIKE', "%{$search}%");
        }
    }

    /**
     * Scope a query to order companies by latest posted
     */
    public function scopeLatest(Builder $query): Builder
    {
        return $query->orderBy('posted_at', 'desc');
    }

    /**
     * Scope a query to only include companies posted last month.
     */
    public function scopeLastMonth(Builder $query, int $limit = 5): Builder
    {
        return $query->whereBetween('posted_at', [carbon('1 month ago'), now()])
                     ->latest()
                     ->limit($limit);
    }

    /**
     * Scope a query to only include companies posted last week.
     */
    public function scopeLastWeek(Builder $query): Builder
    {
        return $query->whereBetween('posted_at', [carbon('1 week ago'), now()])
                     ->latest();
    }

    /**
     * Return the companies's author
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Return the companies's country
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(LocationCountry::class, 'country_id');
    }

    /**
     * Return the product's company
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Return the companies's thumbnail
     */
    public function thumbnail(): BelongsTo
    {
        return $this->belongsTo(Media::class);
    }

    /**
     * return the excerpt of the companies content
     */
    public function excerpt(int $length = 50): string
    {
        return Str::limit($this->content, $length);
    }

    /**
     * return true if the companies has a thumbnail
     */
    public function hasThumbnail(): bool
    {
        return filled($this->thumbnail_id);
    }
}
