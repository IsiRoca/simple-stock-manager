<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class ProductFeedController extends Controller
{
    /**
     * Show the rss feed of products.
     */
    public function index(): Response
    {
        $products = Cache::remember('feed-products', now()->addHour(), fn () => Product::latest()->limit(20)->get());

        return response()->view('products_feed.index', [
            'products' => $products
        ], 200)->header('Content-Type', 'text/xml');
    }
}
