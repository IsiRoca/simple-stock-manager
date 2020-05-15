<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product as ProductResource;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Response;

class CompanyProductController extends Controller
{
    /**
     * Return the user's products.
     */
    public function index(Request $request, Company $company): ResourceCollection
    {
        return ProductResource::collection(
            $company->products()->latest()->paginate($request->input('limit', 50))
        );
    }
}
