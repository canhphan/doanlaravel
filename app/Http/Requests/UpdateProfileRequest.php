<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'avatar'=>'image|mimes:jpeg,png,jpg,gif|max:2048',

        ];
    }

    public function messages()
    {
        return [
            'required' =>':attribute :Trường này bắt buộc phải nhập'
        ];
    }
}

