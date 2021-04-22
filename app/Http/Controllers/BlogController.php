<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Requests\Blog\StoreRequest;
use App\Http\Requests\Blog\UpdateRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::orderBy('created_at','DESC')->search()->paginate(10);
        return view('admin.blog.index',compact('blog'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
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
            $file_name=time().'-blog.'.$extension;
            $file->move(public_path('uploads/blogs'),$file_name);
            $request->merge(['blog_image'=>$file_name]);
        }
        Blog::create($request->all());
        return redirect()->route('blog.index')
            ->with('success','Thêm mới sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit')->with(compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Blog $blog)
    {
        if($request->has('file_upload')){
            $file=$request->file_upload;
            $extension=$request->file_upload->extension();
            $file_name=time().'-blog.'.$extension;
            $file->move(public_path('uploads/blogs'),$file_name);
            $request->merge(['blog_image'=>$file_name]);
        }
        $blog->update($request->only('name','slug','blog_desc','blog_content','blog_status','blog_image'
            ,'blog_image_list','blog_meta_keyword','blog_meta_title','blog_meta_description'));
        return redirect()->route('blog.index')->with('success','Cập nhật bài viết thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog.index')->with('success','Xóa danh mục thành công');
    }
}
