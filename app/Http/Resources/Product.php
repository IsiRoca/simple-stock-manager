<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'company_id' => $this->company_id,
            'company_name' => $this->company->name,
            'content' => $this->content,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'sku' => $this->sku,
            'author_id' => $this->author_id,
            'author_name' => $this->author->name,
            'author_url' => route('users.show', $this->author),
            'product_type_id' => $this->product_type_id,
            'product_type_name' => $this->type->title,
            'posted_at' => $this->posted_at->toIso8601String(),
            'comments_count' => $this->comments_count ?? $this->comments()->count(),
            'thumbnail_url' => $this->when($this->hasThumbnail(), url(optional($this->thumbnail)->getUrl())),
            'thumb_thumbnail_url' => $this->when($this->hasThumbnail(), url(optional($this->thumbnail)->getUrl('thumb')))
        ];
    }
}
