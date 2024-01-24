<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title' => 'required|min:4|max:32',
            'content' => 'required|min:4',
            'category_id' => 'required|gt:0',
        ];
    }

    public function messages()
    {
        return[
            'title.required' => 'You must fill in the title.',
            'title.min'=>'The title must be at least 4 words.',
            'title.max' =>'The title can be up to 32 words.',
            'content.required' =>'You have to fill in the content.',
            'content.min' => 'The content should be at least 4 words.',
            'category_id.required' => 'You have to choose the category.',
            'category_id.gt' => 'You have to choose the category.',
        ];
    }
}
