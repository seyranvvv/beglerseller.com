<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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


        $merge['datetime'] = Carbon::parse($this->get('datetime'))->format('Y-m-d H:i:s');

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
            'content' => 'required|array',
            'content.*' => 'required|string',
            'image' => 'nullable|image',
            'datetime' => 'required|date',
        ];
    }
}
