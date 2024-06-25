<?php

namespace App\Modules\Content\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'headline' => 'required|max:250|min:20',
            'content' => 'required|min:50',
            'categories' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'headline.required' => 'The Headline field is required.',
            'headline.max' => 'The Headline Should not be more than 250 character.',
            'content.required' => 'The content field is required.',
        ];
    }
}
