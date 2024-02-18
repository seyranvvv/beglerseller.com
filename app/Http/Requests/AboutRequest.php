<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|array',
            'title.*' => 'required|string',
            'content' => 'required|array',
            'content.*' => 'required|string',
            'years_text' => 'required|array',
            'years_text.*' => 'required|string',
            'years_number' => 'required|numeric',
            'image' => 'nullable|image',
            'image2' => 'nullable|image',
        ];
    }
}
