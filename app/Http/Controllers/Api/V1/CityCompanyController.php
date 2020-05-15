<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Company as CompanyResource;
use App\Models\LocationCity;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CityCompanyController extends Controller
{
    /**
     * Return the user's products.
     */
    public function index(Request $request, LocationCity $city): ResourceCollection
    {
        return CompanyResource::collection(
            $city->companies()->latest()->paginate($request->input('limit', 20))
        );
    }
}
