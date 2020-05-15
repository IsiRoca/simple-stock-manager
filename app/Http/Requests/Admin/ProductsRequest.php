<?php

namespace App\Http\Requests\Admin;

use App\Models\User;
use App\Rules\CanBeAuthor;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->input('title'))
        ]);

        $this->merge([
            'posted_at' => Carbon::parse($this->input('posted_at'))
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'content' => 'required',
            'posted_at' => 'required|date',
            'sku' => 'required',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'quantity' => 'required|numeric',
            'thumbnail_id' => 'nullable|exists:media,id',
            'author_id' => ['required', 'exists:users,id', new CanBeAuthor],
            'slug' => 'unique:products,slug,' . (optional($this->product)->id ?: 'NULL'),
        ];
    }
}
