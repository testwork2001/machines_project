<?php

namespace App\Http\Requests\Admin\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
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
            'name' => ['required', 'string', 'between:1,1000'],
            'email' => ['required', 'string', 'email', "unique:admins,email,{$this->admin->id},id"],
            'status' => ['required', 'integer', 'in:1,0'],
            'email_verified_at' => ['required', 'integer', 'in:1,0'],
            'password' => ['nullable', 'regex:"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"', 'confirmed'],
            'image' => ['nullable', 'file', 'max:1024']
        ];
    }
}
