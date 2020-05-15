<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProductsRequest;
use App\Http\Resources\Product as ProductResource;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;

class ProductTypeProductController extends Controller
{
    /**
     * Return the product's products.
     */
    public function index(Request $request, ProductType $type): ResourceCollection
    {
        return ProductResource::collection(
            $type->products()->with('author', 'company')->latest()->paginate($request->input('limit', 50))
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductsRequest $request, ProductType $productType): ProductResource
    {
        $product = new ProductResource(
            Auth::user()->products()->create([
                'product_type_id' => $productType->id,
                'content' => $request->input('content')
            ])
        );

        return $product;
    }
}
