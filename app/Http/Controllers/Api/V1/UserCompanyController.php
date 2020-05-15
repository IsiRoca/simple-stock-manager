<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Company as CompanyResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCompanyController extends Controller
{
    /**
     * Return the user's companies.
     */
    public function index(Request $request, User $user): ResourceCollection
    {
        return CompanyResource::collection(
            $user->companies()->latest()->paginate($request->input('limit', 50))
        );
    }
}
