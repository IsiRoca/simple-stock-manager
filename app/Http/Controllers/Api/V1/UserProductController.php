<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product as ProductResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserProductController extends Controller
{
    /**
     * Return the user's products.
     */
    public function index(Request $request, User $user): ResourceCollection
    {
        return ProductResource::collection(
            $user->products()->latest()->paginate($request->input('limit', 20))
        );
    }
}
