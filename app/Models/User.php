<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'firstname',
        'lastname',
        'address',
        'housenumber',
        'city',
        'state',
        'country',
        'zipcode',
        'phone',
        'mobile',
        'dateofbirth',
        'gender',
        'ip_address',
        'active',
        'blocked',
        'provider',
        'provider_id',
        'api_token',
        'referred_by',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'registered_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the user's fullname titleized.
     */
    public function getFullnameAttribute(): string
    {
        return Str::title($this->name);
    }

    /**
     * Scope a query to only include users registered last week.
     */
    public function scopeLastWeek(Builder $query): Builder
    {
        return $query->whereBetween('registered_at', [carbon('1 week ago'), now()])
                     ->latest();
    }

    /**
     * Scope a query to order users by latest registered.
     */
    public function scopeLatest(Builder $query): Builder
    {
        return $query->orderBy('registered_at', 'desc');
    }

    /**
     * Scope a query to filter available author users.
     */
    public function scopeAuthors(Builder $query): Builder
    {
        return $query->whereHas('roles', function ($query) {
            $query->where('roles.name', config('values.roles.role_superadmin_name'))
                  ->orWhere('roles.name', config('values.roles.role_admin_name'))
                  ->orWhere('roles.name', config('values.roles.role_editor_name'));
        });
    }

    /**
     * Check if the user can be an author
     */
    public function canBeAuthor(): bool
    {
        return $this->isAdmin() || $this->isEditor();
    }

    /**
     * Check if the user has a role
     */
    public function hasRole(string $role): bool
    {
        return $this->roles->where('name', $role)->isNotEmpty();
    }

    /**
     * Check if the user has role superadmin
     */
    public function isSuperadmin(): bool
    {
        return $this->hasRole(config('values.roles.role_superadmin_name'));
    }

    /**
     * Check if the user has role admin
     */
    public function isAdmin(): bool
    {
        return $this->hasRole(config('values.roles.role_admin_name'));
    }

    /**
     * Check if the user has role editor
     */
    public function isEditor(): bool
    {
        return $this->hasRole(config('values.roles.role_editor_name'));
    }

    /**
     * Scope a query to search users
     */
    public function scopeSearch(Builder $query, ?string $search)
    {
        if ($search) {
            return $query->where('name', 'LIKE', "%{$search}%");
        }
    }

    /**
     * Return the user's products
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'author_id');
    }

    /**
     * Return the user's products
     */
    public function companies(): HasMany
    {
        return $this->hasMany(Company::class, 'author_id');
    }

    /**
     * Return the user's comments
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'author_id');
    }

    /**
     * Return the user's likes
     */
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class, 'author_id');
    }

    /**
     * Return the user's roles
     */
    public function roles(): belongsToMany
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
}
