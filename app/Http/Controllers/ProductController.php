<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index(Request $request): View
    {
        return view('products.index', [
            'products' => Product::search($request->input('q'))
                             ->with('author', 'likes')
                             ->withCount('comments', 'thumbnail', 'likes')
                             ->latest()
                             ->paginate(20)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Product $product): View
    {
        $product->comments_count = $product->comments()->count();
        $product->likes_count = $product->likes()->count();

        return view('products.show', [
            'product' => $product
        ]);
    }
}
