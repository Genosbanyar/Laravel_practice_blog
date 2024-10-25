<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     */ public function rules(): array
    {
        return 
        [
            'name' => 'required|unique:posts|max:255', 
            'content' => 'required', 
            'category_id' => 'required',
            'user_id' => 'required'
        ];
    }
    public function messages(): array
    {
        return 
        [
            'name.required' => 'A title is required',
            'content.required' => 'A message is required',
            'category_id.required' => 'A category is required',
        ];
    }
}
