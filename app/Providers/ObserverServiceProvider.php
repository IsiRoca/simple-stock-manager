<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Media;
use App\Models\Product;
use App\Models\User;
use App\Observers\CommentObserver;
use App\Observers\MediaObserver;
use App\Observers\ProductObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        Product::observe(ProductObserver::class);
        User::observe(UserObserver::class);
        Comment::observe(CommentObserver::class);
        Media::observe(MediaObserver::class);
    }
}
