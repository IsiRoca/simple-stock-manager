<?php

namespace App\Http\Requests\Admin;

use App\Models\User;
use App\Rules\CanBeAuthor;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class LocationCountriesRequest extends FormRequest
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
	//
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'iso_alpha_2' => 'required',
            'iso_alpha_3' => 'required',
            'iso_numeric' => 'required',
            'international_phone' => 'required',
            'visible' => 'required',
        ];
    }
}
