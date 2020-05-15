<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'encrypted_password' => $this->password,
            'api_token' => $this->api_token,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'address' => $this->address,
            'housenumber' => $this->housenumber,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'zipcode' => $this->zipcode,
            'phone' => $this->phone,
            'mobile' => $this->mobile,
            'dateofbirth' => $this->dateofbirth,
            'gender' => $this->gender,
            'ip_address' => $this->ip_address,
            'active' => $this->active,
            'blocked' => $this->blocked,
            'referred_by' => $this->referred_by,
            'affiliate_id' => $this->affiliate_id,
            'remember_token' => $this->remember_token,
            'email_verified_at' => $this->email_verified_at,
            'provider' => $this->provider,
            'provider_id' => $this->provider_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'registered_at' => $this->registered_at->toIso8601String(),
            'products_count' => $this->products_count ?? $this->products()->count(),
            'companies_count' => $this->companies_count ?? $this->companies()->count(),
            'comments_count' => $this->comments_count ?? $this->comments()->count(),
            'roles' => Role::collection($this->roles),
        ];
    }
}
