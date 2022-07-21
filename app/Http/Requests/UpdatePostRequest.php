<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // if ($this->user_id == auth()->user()->id) {
        //     return true;
        // } else {
        //     return false;
        // }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $post = $this->route()->parameter('post');
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:posts',
            'status' => 'required|in:Yes,No',
            'category_id' => 'required',
            'extract' => 'required',
            'body' => 'required',
            'image' => 'mimes:jpg,jpeg,png',
        ];

        if($post)
        {
            $rules['slug'] = 'required|unique:posts,slug,' . $post->id;
        }

        return $rules;
    }
}
