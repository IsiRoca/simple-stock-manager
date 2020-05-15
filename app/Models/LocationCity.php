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

class LocationCity extends Model
{
    use Likeable;
    protected $table = 'location_cities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_id',
        'name',
        'description'
    ];

    /**
     * The "booting" method of the model.
     */
    protected static function boot(): void
    {
        parent::boot();
    }

    /**
     * Scope a query to search city location
     */
    public function scopeSearch(Builder $query, ?string $search)
    {
        if ($search) {
            return $query->where('name', 'LIKE', "%{$search}%");
        }
    }

    /**
     * Scope a query to order city location by latest posted
     */
    public function scopeLatest(Builder $query): Builder
    {
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * Scope a query to only include city location posted last month.
     */
    public function scopeLastMonth(Builder $query, int $limit = 5): Builder
    {
        return $query->whereBetween('created_at', [carbon('1 month ago'), now()])
                     ->latest()
                     ->limit($limit);
    }

    /**
     * Scope a query to only include city location posted last week.
     */
    public function scopeLastWeek(Builder $query): Builder
    {
        return $query->whereBetween('created_at', [carbon('1 week ago'), now()])
                     ->latest();
    }

    /**
     * Return the user's products
     */
    public function companies(): HasMany
    {
        return $this->hasMany(Company::class, 'city_id');
    }

    /**
     * Return the country's city
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(LocationCountry::class);
    }

    /**
     * Return the user's products
     */
    public function companies_with_products(): HasMany
    {
        return $this->companies()->has('products');;
    }

    /**
     * return the excerpt of the city location content
     */
    public function excerpt(int $length = 50): string
    {
        return Str::limit($this->content, $length);
    }
}
