<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
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
            'name' => 'required|array',
            'name.*' => 'required|string',
            'body' => 'required|array',
            'body.*' => 'required|string',
            'counter_text' => 'nullable|array',
            'counter_text.*' => 'nullable|string',
            'counter_number' => 'nullable|numeric',
            'image' => 'nullable|image',
            'card_type_id' => 'required|exists:card_types,id',
        ];
    }
}
