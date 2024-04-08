<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'price'=> 'required|numeric',
            'discount_amount'=> 'nullable|numeric',
            'title.*' => 'required|string',
            'content' => 'required|array',
            'content.*' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image_1' => 'nullable|image',
            'image_2' => 'nullable|image',
            'image_3' => 'nullable|image',
            'image_4' => 'nullable|image',
            'image_5' => 'nullable|image',
        ];
    }
}
