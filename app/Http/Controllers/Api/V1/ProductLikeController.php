<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductLikeController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request, Product $product)
    {
        return $product->like();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        return $product->dislike();
    }
}
