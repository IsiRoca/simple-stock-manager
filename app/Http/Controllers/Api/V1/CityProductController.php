<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product as ProductResource;
use App\Models\LocationCity;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Response;

class CityProductController extends Controller
{
    /**
     * Return the user's products.
     */
    public function index(Request $request, LocationCity $city): ResourceCollection
    {
        if (!$city) {
            throw new HttpException(400, "Invalid id");
        }

        if ($companies = $city->companies()->find($city->id)) {
            return ProductResource::collection(
                $companies->products()->latest()->paginate($request->input('limit', 50))
            );
        }
        abort(404, 'not found');
    }
}
