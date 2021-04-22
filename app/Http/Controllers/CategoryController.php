<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_category = Category::orderBy('id','ASC')->search()->paginate(10);
        return view('admin.product_category.index',compact('product_category'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category =Category::orderBy('id','DESC')->get();
        return view('admin.product_category.create')->with(compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        Category::create($request->all());
        return redirect()->route('category.index')
            ->with('success','Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        $categories = Category::all();   
        return view('admin.product_category.edit')->with(compact('category'))->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, category $category)
    {

        $category->update($request->only('name','slug','category_desc','category_order','category_status','parent_id'));
        return redirect()->route('category.index')->with('success','Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
       
        if($category->products->count()>0){
            dd($category);
            return redirect()->route('category.index')->with('error','Không thể xóa danh mục này');
        }else{
            
            $category->delete();
           
            return redirect()->route('category.index')->with('success','Xóa danh mục thành công');
        }
    }
}
