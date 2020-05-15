<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LocationCitiesRequest;
use App\Http\Resources\LocationCity as LocationCityResource;
use App\Models\LocationCity;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class LocationCityController extends Controller
{
    /**
     * Return the cities.
     */
    public function index(Request $request): ResourceCollection
    {
        return LocationCityResource::collection(
            LocationCity::search($request->input('q'))->with('country')->latest()->paginate($request->input('limit', 20))
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationCitiesRequest $request, LocationCity $city): LocationCityResource
    {
        $this->authorize('update', $city);

        $city->update($request->only(['name', 'description', 'country_id']));

        return new LocationCityResource($city);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationCitiesRequest $request): LocationCityResource
    {
        $this->authorize('store', LocationCity::class);

        return new LocationCityResource(
            LocationCity::create($request->only(['name', 'description', 'country_id']))
        );
    }

    /**
     * Return the specified resource.
     */
    public function show(LocationCity $city): LocationCityResource
    {
        return new LocationCityResource($city);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LocationCity $city): Response
    {
        $this->authorize('delete', $city);

        $city->delete();

        return response()->noContent();
    }
}
