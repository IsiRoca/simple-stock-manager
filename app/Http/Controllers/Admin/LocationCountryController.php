<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LocationCountriesRequest;
use App\Models\MediaLibrary;
use App\Models\LocationCountry;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LocationCountryController extends Controller
{
    /**
     * Show the application countries index.
     */
    public function index(): View
    {
        return view('admin.countries.index', [
            'countries' => LocationCountry::latest()->paginate(50)
        ]);
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(LocationCountry $country): View
    {
        return view('admin.countries.edit', [
            'country' => $country
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        return view('admin.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CountriesRequest $request): RedirectResponse
    {
        $country = LocationCountry::create($request->only(['name', 'iso_alpha_2', 'iso_alpha_2', 'iso_alpha_3', 'iso_numeric', 'international_phone', 'visible']));

        return redirect()->route('admin.countries.edit', $country)->withSuccess(__('countries.created'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CountriesRequest $request, LocationCountry $country): RedirectResponse
    {
        $country->update($request->only(['name', 'iso_alpha_2', 'iso_alpha_2', 'iso_alpha_3', 'iso_numeric', 'international_phone', 'visible']));

        return redirect()->route('admin.countries.edit', $country)->withSuccess(__('countries.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LocationCountry  $country)
    {
        $country->delete();

        return redirect()->route('admin.countries.index')->withSuccess(__('countries.deleted'));
    }
}
