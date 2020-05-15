<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Response;

class ProductThumbnailController extends Controller
{
    /**
     * Unset the product's thumbnail.
     */
    public function destroy(Product $product): Response
    {
        $product->update(['thumbnail_id' => null]);

        return redirect()->route('admin.products.edit', $product)->withSuccess(__('products.updated'));
    }
}
