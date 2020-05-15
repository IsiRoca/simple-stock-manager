<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LocationCity extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'country_id' => $this->country_id,
            'country_name' => $this->country['name'],
            'country' => new LocationCountry($this->country)
        ];
    }
}
