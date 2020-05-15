<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductTypesRequest;
use App\Http\Resources\ProductType as ProductTypeResource;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class ProductTypeController extends Controller
{
    /**
     * Return the types.
     */
    public function index(Request $request): ResourceCollection
    {
        return ProductTypeResource::collection(
            ProductType::search($request->input('q'))->latest()->paginate($request->input('limit', 50))
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductTypesRequest $request, ProductType $type): ProductTypeResource
    {
        $this->authorize('update', $type);

        $type->update($request->only(['title', 'content', 'sku', 'price', 'quantity', 'posted_at', 'author_id', 'thumbnail_id']));

        return new ProductTypeResource($type);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductTypesRequest $request): ProductTypeResource
    {
        $this->authorize('store', ProductType::class);

        return new ProductTypeResource(
            ProductType::create($request->only(['title', 'content', 'sku', 'price', 'quantity', 'posted_at', 'author_id', 'thumbnail_id']))
        );
    }

    /**
     * Return the specified resource.
     */
    public function show(ProductType $type): ProductTypeResource
    {
        return new ProductTypeResource($type);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductType $type): Response
    {
        $this->authorize('delete', $type);

        $type->delete();

        return response()->noContent();
    }
}
