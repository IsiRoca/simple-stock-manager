<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\LocationCity as CityResource;
use App\Models\LocationCountry;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CountryCityController extends Controller
{
    /**
     * Return the user's products.
     */
    public function index(Request $request, LocationCountry $country): ResourceCollection
    {
        return CityResource::collection(
            $country->cities()->latest()->paginate($request->input('limit', 20))
        );
    }
}
