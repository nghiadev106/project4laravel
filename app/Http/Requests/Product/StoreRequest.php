<?php

namespace App\Http\Requests\Product;

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
            'name' => 'required|max:255|unique:tbl_product',
            'slug' => 'required|max:255|unique:tbl_product',
            'product_status' => 'required',
            'category_id'=>'required',
            'product_price' => 'required',
            'product_content'=>'required',
            'product_desc'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'name.max' => 'Tên sản phẩm không được quá 255 ký tự',
            'slug.required' => 'Link sản phẩm không được để trống',
            'slug.unique' => 'Link sản phẩm đã tồn tại',
            'slug.max' => 'Link sản phẩm không được quá 255 ký tự',
            'product_status.required' => 'Mời bạn chọn trạng thái',
            'category_id.required'=>'Mời bạn chọn danh mục',
            'product_price.required' => 'Giá sản phẩm không được để trống',
            'product_content.required' => 'Nội dung sản phẩm không được để trống',
            'product_desc.required' => 'Mô tả sản phẩm không được để trống'
        ];
    }
}
