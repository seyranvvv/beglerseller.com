<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    protected function prepareForValidation()
    {
        $merge = [];

        if (!$this->exists('status')) {
            $merge['status'] = false;
        }

        $this->merge($merge);
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
            'body' => 'required|array',
            'body.*' => 'required|string',
            'url' => 'nullable|string',
            'status' => 'boolean',
            'image' => 'nullable|array',
            'image.*' => 'nullable|image',
            
        ];
    }
}
