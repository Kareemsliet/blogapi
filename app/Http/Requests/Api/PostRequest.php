<?php

namespace App\Http\Requests\Api;

use App\Models\Post;
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $post = $this->route("post", null);

        if ($post) {
            $post = Post::where("slug", $post)->first();
        }

        return [
            "title.ar" => "required|string|max:255|unique_translation:posts,title,{$post?->id}",
            "title.en" => "required|string|max:255|unique_translation:posts,title,{$post?->id}",
            "description.ar" => "required|string|max:350",
            "description.en" => "required|string|max:350",
            "images" => "nullable|array|min:1",
            "images.*" => "nullable|mimes:jpg,png,jpeg,gif,svg|max:10480",
        ];
    }


    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        return failResponse($validator->errors()->first());
    }


}
