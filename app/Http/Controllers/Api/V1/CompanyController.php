<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CompaniesRequest;
use App\Http\Resources\Company as CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class CompanyController extends Controller
{
    /**
     * Return the companies.
     */
    public function index(Request $request): ResourceCollection
    {
        return CompanyResource::collection(
            Company::search($request->input('q'))->latest()->paginate($request->input('limit', 50))
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompaniesRequest $request, Company $company): CompanyResource
    {
        $this->authorize('update', $company);

        $company->update($request->only(['author_id', 'country_id', 'name', 'description', 'address', 'email', 'phone', 'contact_person', 'notes', 'posted_at', 'thumbnail_id']));

        return new CompanyResource($company);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompaniesRequest $request): CompanyResource
    {
        $this->authorize('store', Company::class);

        return new CompanyResource(
            Company::create($request->only(['author_id', 'country_id', 'name', 'description', 'address', 'email', 'phone', 'contact_person', 'notes', 'posted_at', 'thumbnail_id']))
        );
    }

    /**
     * Return the specified resource.
     */
    public function show(Company $company): CompanyResource
    {
        return new CompanyResource($company);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company): Response
    {
        $this->authorize('delete', $company);

        $company->delete();

        return response()->noContent();
    }
}
