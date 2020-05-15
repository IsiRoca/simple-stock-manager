<?php

namespace App\Models;

use App\Concern\Likeable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class LocationCountry extends Model
{
    use Likeable;
    protected $table = 'location_countries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'iso_alpha_2',
        'iso_alpha_3',
        'iso_numeric',
        'international_phone',
        'visible',
    ];

    /**
     * The "booting" method of the model.
     */
    protected static function boot(): void
    {
        parent::boot();
    }

    /**
     * Prepare a date for array / JSON serialization.
     */
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * Scope a query to search country location
     */
    public function scopeSearch(Builder $query, ?string $search)
    {
        if ($search) {
            return $query->where('name', 'LIKE', "%{$search}%");
        }
    }

    /**
     * Return the country location's thumbnail
     */
    public function thumbnail(): BelongsTo
    {
        return $this->belongsTo(Media::class);
    }

    /**
     * Return the user's products
     */
    public function cities(): HasMany
    {
        return $this->hasMany(LocationCity::class, 'country_id');
    }

    /**
     * Return the country location's comments
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * return the excerpt of the country location content
     */
    public function excerpt(int $length = 50): string
    {
        return Str::limit($this->description, $length);
    }
}
