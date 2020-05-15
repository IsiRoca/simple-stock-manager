<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductObserver
{
    /**
     * Listen to the Product saving event.
     */
    public function saving(Product $product): void
    {
        $product->slug = Str::slug($product->title, '-');
    }
}
