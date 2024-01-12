<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryAddRequest extends FormRequest
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
            'title' => 'required|max:50',
            'slug' => 'required|max:255|unique:categories, slug',
            'subtitle' => 'max:255',
            'excerpt' => 'max:6000',
            'views' => 'required|numeric|min:0',

            'meta_title' => 'max:255',
            'meta_description' => 'max:255',
            'meta_keywords' => 'max:255',

            'photo' => 'max:1024',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title are mandatory',
            'title.max' => 'The name of category cannot be longer than 50 characters',
            'slug.required' => 'The slug is mandatory',
            'slug.max' => 'The slug of category does not have more than 255 characters',
            'slug.unique' => 'This slug is already registered on this site for existing categories',
            'subtitle.max' => 'The subtitle cannot have more than 30 characters',
            'excerpt.max' => 'Description category cannot have more than 120 characters',

            'views.numeric' => "Number of views must be a number than 0",
            'views.min' => "Number of views must be a number than 0",
            'views.required' => "Number of views must be a number than 0",

            'meta_title.max' => 'The meta_tile tag cannot have more than 255 characters',
            'meta_description.max' => 'The meta_description tag cannot have more than 255 characters',
            'meta_keywords.max' => 'The meta_keywords category tag have more than 255 characters',

            'photo.max' => 'The user is photo cannot be more than 1 Mb!'
        ];
    }
}
