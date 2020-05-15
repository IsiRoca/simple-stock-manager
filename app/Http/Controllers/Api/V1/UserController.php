<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use App\Http\Resources\User as UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Return the users.
     */
    public function index(Request $request): ResourceCollection
    {
        return UserResource::collection(
            User::search($request->input('q'))->withCount(['comments', 'products', 'companies'])->with('roles')->latest()->paginate($request->input('limit', 50))
        );
    }

    /**
     * Return the specified resource.
     */
    public function show(User $user): UserResource
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsersRequest $request, User $user): UserResource
    {
        $this->authorize('update', $user);

        if ($request->filled('password')) {
            $request->merge([
                'password' => Hash::make($request->input('password'))
            ]);
        }

        $user->update(array_filter($request->only(['name', 'email', 'password', 'firstname', 'lastname', 'address', 'housenumber', 'city', 'state', 'country', 'zipcode', 'phone', 'mobile', 'dateofbirth', 'gender'])));

        return new UserResource($user);
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(UsersRequest $request): UserResource
    {
        $this->authorize('store', User::class);

        return new UserResource(
            User::create($request->only(['name', 'email', 'password', 'firstname', 'lastname', 'address', 'housenumber', 'city', 'state', 'country', 'zipcode', 'phone', 'mobile', 'dateofbirth', 'gender']))
        );
    }
}
