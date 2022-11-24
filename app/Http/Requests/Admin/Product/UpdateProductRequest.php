<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => ['required', 'string', 'min:5'],
            "price" => ['required', 'numeric', 'min:1'],
            "quantity" => ['required', 'integer', 'min:1'],
            "status" => ['required', 'in:0,1'],
            "description" => ['required', 'string', 'between:20,2000'],
            "specs" => ['required', 'array'],
            'specs.*.spec_id' => ['required', 'integer', "exists:specs,id"],
            'specs.*.value' => ['required', 'min:2'],
            "images" => ['nullable', 'array'],
            "images.*.file_name" => ['required', 'file'],
            'oldimages' => ['nullable', 'array'],
            'oldimages.*.id' => ['nullable', 'integer', 'exists:media,id']
        ];
    }
}
