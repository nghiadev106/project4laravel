@extends('admin.layout_admin')

@section('css')
<link rel="stylesheet" href="{{url('public')}}/backend/bower_components/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
@stop
@section('js')
<script src="{{url('public')}}/backend/bower_components/ckeditor/ckeditor.js"></script>
<script src="{{url('public')}}/backend/js/custemUrl.js"></script>
<script src="{{url('public')}}/backend/bower_components/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
    $(function () {

      CKEDITOR.replace( 'blog_content' );
      //$('#blog_content').wysihtml5()
    })
  </script>
@stop
@section('admin_content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm mới bài viết
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="#">Sản phẩm</a></li>
            <li class="active">Thêm bài viết</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">         
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">                       
                        <div class="position-center">
                                    <form role="form" action="{{ route('blog.update',$blog->id) }}" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" value="{{$blog->id}}"  name="id">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <label for="">Tên bài viết</label>
                                                    <input type="text"  class="form-control" value="{{$blog->name}}"  name="name" id="name" >
                                                    @error('name')
                                                        <small class="danger" style="color: red;">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Link</label>
                                                    <input type="text"  class="form-control" value="{{$blog->slug}}"  name="slug" id="slug">
                                                    @error('slug')
                                                        <small class="danger" style="color: red;">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Mô tả</label>
                                                    <textarea style="resize: none" rows="4" class="form-control" name="blog_desc" placeholder="Mô tả danh mục">{{$blog->blog_desc}}</textarea>
                                                    @error('blog_desc')
                                                    <small class="danger" style="color: red;">{{$message}}</small>
                                                   @enderror 
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Nội dung</label>
                                                    <textarea type="text" id="blog_content" class="form-control"  name="blog_content" >{{$blog->blog_content}}</textarea>
                                                    @error('blog_content')
                                                    <small class="danger" style="color: red;">{{$message}}</small>
                                                   @enderror 
                                                </div>   
                                                <div class="form-group">
                                                    <label for="">Meta Keyword</label>
                                                    <input type="text" value="{{$blog->blog_meta_keyword}}"  class="form-control"  name="blog_meta_keyword" >
                                                </div> 
                                                <div class="form-group">
                                                    <label for="">Meta Title</label>
                                                    <input type="text" value="{{$blog->blog_meta_title}}"  class="form-control"  name="blog_meta_title" >
                                                </div> 
                                                <div class="form-group">
                                                    <label for="">Meta Decreption</label>
                                                    <input type="text" value="{{$blog->blog_meta_description}}"  class="form-control"  name="blog_meta_description" >
                                                </div> 
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Ảnh</label>
                                                    <input type="file" value="{{$blog->blog_image}}"  class="form-control"  name="file_upload" >
                                                    @error('blog_image')
                                                <small class="danger" style="color: red;">{{$message}}</small>
                                               @enderror
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="">Thêm ảnh</label>
                                                    <input type="file" value="{{$blog->blog_image_list}}"  class="form-control"  name="blog_image_list" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Trạng thái</label>
                                                    <select name="blog_status" class="form-control input-sm m-bot15">
                                                        @if($blog->blog_status==1){
                                                            <option value="1" selected>Hiển thị</option>
                                                            <option value="0">Ẩn</option>
                                                          }
                                                          @else{
                                                            <option value="1">Hiển thị</option>
                                                            <option value="0" selected>Ẩn</option>
                                                          }
                                                        @endif
                                                    </select>
                                                    @error('blog_status')
                                                <small class="danger" style="color: red;">{{$message}}</small>
                                               @enderror
                                              
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="col-md-5">
                                                        <button type="submit" class="btn btn-info">Sửa bài viết</button>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <a class="btn btn-danger" href="{{ route('blog.index') }}">Quay lại</a>
                                                     </div>
                                                </div>
                                            </div>
                                        </div>
                                  
                                    </form>
                                </div>                 
                        </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection

