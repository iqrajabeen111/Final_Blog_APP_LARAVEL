<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'slug' => 'required',
            'image' => 'required',
            'description' => 'required',
            'category' => 'required',
          
           
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'slug.required' => 'A slug is required',
            'image.required' => 'A image is required',
            'description.required' => 'A description is required',
            'category.required' => 'A category is required',
          

        ];
    }
}
