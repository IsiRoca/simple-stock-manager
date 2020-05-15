<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Company extends JsonResource
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
            'country_name' => $this->country->name,
            'address' => $this->address,
            'email' => $this->email,
            'phone' => $this->phone,
            'contact_person' => $this->contact_person,
            'notes' => $this->notes,
            'posted_at' => $this->posted_at->toIso8601String(),
            'author_id' => $this->author_id,
            'author_name' => $this->author->name,
            'author_url' => route('users.show', $this->author),
            'thumbnail_url' => $this->when($this->hasThumbnail(), url(optional($this->thumbnail)->getUrl())),
            'thumb_thumbnail_url' => $this->when($this->hasThumbnail(), url(optional($this->thumbnail)->getUrl('thumb')))
        ];
    }
}
