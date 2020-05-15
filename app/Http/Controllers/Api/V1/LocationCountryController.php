<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LocationCountriesRequest;
use App\Http\Resources\LocationCountry as LocationCountryResource;
use App\Models\LocationCountry;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class LocationCountryController extends Controller
{
    /**
     * Return the countries.
     */
    public function index(Request $request): ResourceCollection
    {
        return LocationCountryResource::collection(
            LocationCountry::search($request->input('q'))->latest()->paginate($request->input('limit', 20))
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationCountriesRequest $request, LocationCountry $country): LocationCountryResource
    {
        $this->authorize('update', $country);

        $country->update($request->only(['name', 'iso_alpha_2', 'iso_alpha_2', 'iso_alpha_3', 'iso_numeric', 'international_phone', 'visible']));

        return new LocationCountryResource($country);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationCountriesRequest $request): LocationCountryResource
    {
        $this->authorize('store', LocationCountry::class);

        return new LocationCountryResource(
            LocationCountry::create($request->only(['name', 'iso_alpha_2', 'iso_alpha_2', 'iso_alpha_3', 'iso_numeric', 'international_phone', 'visible']))
        );
    }

    /**
     * Return the specified resource.
     */
    public function show(LocationCountry $country): LocationCountryResource
    {
        return new LocationCountryResource($country);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LocationCountry $country): Response
    {
        $this->authorize('delete', $country);

        $country->delete();

        return response()->noContent();
    }
}
