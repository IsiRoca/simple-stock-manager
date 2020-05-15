<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductsRequest;
use App\Http\Resources\Product as ProductResource;
use App\Models\Product;
use App\Models\Company;
use App\Models\ProductType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Return the products.
     */
    public function index(Request $request): ResourceCollection
    {
        return ProductResource::collection(
            Product::search($request->input('q'))->withCount('comments')->latest()->paginate($request->input('limit', 50))
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductsRequest $request, Product $product): ProductResource
    {
        $this->authorize('update', $product);

        $product->update($request->only(['title', 'content', 'company_id', 'sku', 'price', 'quantity', 'product_type_id', 'posted_at', 'author_id', 'thumbnail_id']));

        return new ProductResource($product);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductsRequest $request, Company $company, ProductType $type): ProductResource
    {
        $this->authorize('store', Product::class);

        $product = new ProductResource(
            Product::create($request->only([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'company_id' => $company->id,
                'sku' => $request->input('sku'),
                'price' => $request->input('price'),
                'quantity' => $request->input('quantity'),
                'posted_at' => Carbon::now(),
                'product_type_id' => $request->input('product_type_id'),
                'author_id' => $request->input('author_id')
            ])
        ));

        return $product;
    }

    /**
     * Return the specified resource.
     */
    public function show(Product $product): ProductResource
    {
        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): Response
    {
        $this->authorize('delete', $product);

        $product->delete();

        return response()->noContent();
    }
}
