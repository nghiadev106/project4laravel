<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::orderBy('created_at','DESC')->search()->paginate(10);
        return view('admin.product.index',compact('product'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =Category::orderBy('name','ASC')->select('id','name')->get();
        return view('admin.product.create')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        if($request->has('file_upload')){
            $file=$request->file_upload;
            $extension=$request->file_upload->extension();
            $file_name=time().'-product.'.$extension;
            $file->move(public_path('uploads/products'),$file_name);
            $request->merge(['product_image'=>$file_name]);
        }
        Product::create($request->all());
        return redirect()->route('product.index')
            ->with('success','Thêm mới sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories =Category::orderBy('name','ASC')->select('id','name')->get();
        return view('admin.product.edit')->with(compact('product'))->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Product $product)
    {
        if($request->has('file_upload')){
            $file=$request->file_upload;
            $extension=$request->file_upload->extension();
            $file_name=time().'-product.'.$extension;
            $file->move(public_path('uploads/products'),$file_name);
            $request->merge(['product_image'=>$file_name]);
        }
        $product->update($request->only('name','slug','product_desc','product_content','product_status','category_id','product_price','product_price_sale','product_image'
            ,'product_image_list','product_tag','product_meta_keyword','product_meta_title','product_meta_description'));
        return redirect()->route('product.index')->with('success','Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success','Xóa danh mục thành công');
    }
}
