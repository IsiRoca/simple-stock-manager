<?php

namespace App\Http\Requests\Admin;

use App\Models\User;
use App\Rules\CanBeAuthor;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ProductTypesRequest extends FormRequest
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
            'author_id' => ['required', 'exists:users,id', new CanBeAuthor],
        ];
    }
}
