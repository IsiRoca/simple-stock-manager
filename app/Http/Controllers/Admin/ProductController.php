<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductsRequest;
use App\Models\MediaLibrary;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Show the application products index.
     */
    public function index(): View
    {
        return view('admin.products.index', [
            'products' => Product::withCount('comments', 'likes')->with('author')->latest()->paginate(50)
        ]);
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(Product $product): View
    {
        return view('admin.products.edit', [
            'product' => $product,
            'users' => User::authors()->pluck('name', 'id'),
            'media' => MediaLibrary::first()->media()->get()->pluck('name', 'id')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        return view('admin.products.create', [
            'users' => User::authors()->pluck('name', 'id'),
            'media' => MediaLibrary::first()->media()->get()->pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductsRequest $request): RedirectResponse
    {
        $product = Product::create($request->only(['title', 'content', 'sku', 'price', 'quantity', 'posted_at', 'author_id', 'thumbnail_id']));

        return redirect()->route('admin.products.edit', $product)->withSuccess(__('products.created'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductsRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->only(['title', 'content', 'sku', 'price', 'quantity', 'posted_at', 'author_id', 'thumbnail_id']));

        return redirect()->route('admin.products.edit', $product)->withSuccess(__('products.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')->withSuccess(__('products.deleted'));
    }
}
