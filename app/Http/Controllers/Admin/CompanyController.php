<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CompaniesRequest;
use App\Models\MediaLibrary;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyController extends Controller
{
    /**
     * Show the application companies index.
     */
    public function index(): View
    {
        return view('admin.companies.index', [
            'companies' => Company::with('author')->latest()->paginate(50)
        ]);
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(Company $company): View
    {
        return view('admin.companies.edit', [
            'company' => $company,
            'users' => User::authors()->pluck('name', 'id'),
            'media' => MediaLibrary::first()->media()->get()->pluck('name', 'id')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        return view('admin.companies.create', [
            'users' => User::authors()->pluck('name', 'id'),
            'media' => MediaLibrary::first()->media()->get()->pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompaniesRequest $request): RedirectResponse
    {
        $company = Company::create($request->only(['name', 'description', 'sku', 'price', 'quantity', 'posted_at', 'author_id', 'thumbnail_id', 'country_id', 'city_id', 'country_id', 'address', 'email', 'phone', 'contact_person', 'notes', 'posted_at']));

        return redirect()->route('admin.companies.edit', $company)->withSuccess(__('companies.created'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompaniesRequest $request, Company $company): RedirectResponse
    {
        $company->update($request->only(['name', 'description', 'sku', 'price', 'quantity', 'posted_at', 'author_id', 'thumbnail_id', 'country_id', 'city_id', 'country_id', 'address', 'email', 'phone', 'contact_person', 'notes', 'posted_at']));

        return redirect()->route('admin.companies.edit', $company)->withSuccess(__('companies.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('admin.companies.index')->withSuccess(__('companies.deleted'));
    }
}
