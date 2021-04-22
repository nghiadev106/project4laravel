<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|max:255|unique:tbl_blogs',
            'slug' => 'required|max:255|unique:tbl_blogs',
            'blog_status' => 'required',
            'blog_content'=>'required',
            'blog_desc'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên bài viết không được để trống',
            'name.unique' => 'Tên bài viết đã tồn tại',
            'name.max' => 'Tên bài viết không được quá 255 ký tự',
            'slug.required' => 'Link bài viết không được để trống',
            'slug.unique' => 'Link bài viết đã tồn tại',
            'slug.max' => 'Link bài viết không được quá 255 ký tự',
            'blog_status.required' => 'Mời bạn chọn trạng thái',
            'blog_content.required' => 'Nội dung bài viết không được để trống',
            'blog_desc.required' => 'Mô tả bài viết không được để trống'
        ];
    }
}
