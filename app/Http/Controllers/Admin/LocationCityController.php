<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LocationCitiesRequest;
use App\Models\MediaLibrary;
use App\Models\LocationCity;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LocationCityController extends Controller
{
    /**
     * Show the application cities index.
     */
    public function index(): View
    {
        return view('admin.cities.index', [
            'cities' => LocationCity::latest()->paginate(50)
        ]);
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(LocationCity $city): View
    {
        return view('admin.cities.edit', [
            'city' => $city
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        return view('admin.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CitiesRequest $request): RedirectResponse
    {
        $city = LocationCity::create($request->only(['name', 'description', 'country_id']));

        return redirect()->route('admin.cities.edit', $city)->withSuccess(__('cities.created'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CitiesRequest $request, LocationCity $city): RedirectResponse
    {
        $city->update($request->only(['name', 'description', 'country_id']));

        return redirect()->route('admin.cities.edit', $city)->withSuccess(__('cities.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LocationCity  $city)
    {
        $city->delete();

        return redirect()->route('admin.cities.index')->withSuccess(__('cities.deleted'));
    }
}
