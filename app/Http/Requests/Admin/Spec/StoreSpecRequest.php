<?php

namespace App\Http\Requests\Admin\Spec;

use Illuminate\Foundation\Http\FormRequest;

class StoreSpecRequest extends FormRequest
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
            "specs"=>['required','array'],
            'specs.*.name' =>['required','unique:specs','string','between:2,50']
        ];
    }
}
