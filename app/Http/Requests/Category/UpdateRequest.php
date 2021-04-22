<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|max:255|unique:tbl_category_product,name,'.request()->id,
            'slug' => 'required|max:255|unique:tbl_category_product,slug,'.request()->id,
            'category_status' => 'required',
            'category_order'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không được để trống',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'name.max' => 'Tên danh mục không được quá 255 ký tự',
            'slug.unique' => 'Link danh mục đã tồn tại',
            'slug.max' => 'Link danh mục không được quá 255 ký tự',
            'slug.required' => 'Link danh mục không được để trống',
            'category_status.required' => 'Mời bạn chon trạng thái',
            'category_order.required'=>'Vị trí không được để trống'
        ];
    }
}
