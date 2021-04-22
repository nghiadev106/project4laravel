@extends('admin.layout_admin')
@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm mới bài viết
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a href="#">Bài viết</a></li>
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
                                    <form role="form" action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <label for="">Tên sản phẩm</label>
                                                    <input type="text"  class="form-control"  name="name" id="name" >
                                                    @error('name')
                                                        <small class="danger" style="color: red;">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Link</label>
                                                    <input type="text"  class="form-control"  name="slug" id="slug">
                                                    @error('slug')
                                                        <small class="danger" style="color: red;">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Mô tả</label>
                                                    <textarea style="resize: none" rows="4" class="form-control" name="blog_desc" id="" placeholder="Mô tả danh mục"></textarea>
                                                    @error('blog_desc')
                                                    <small class="danger" style="color: red;">{{$message}}</small>
                                                   @enderror 
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Nội dung</label>
                                                    <textarea type="text" id="blog_content"  class="form-control"  name="blog_content" ></textarea>
                                                    @error('blog_content')
                                                    <small class="danger" style="color: red;">{{$message}}</small>
                                                   @enderror 
                                                </div>   
                                                <div class="form-group">
                                                    <label for="">Meta Keyword</label>
                                                    <input type="text"  class="form-control"  name="blog_meta_keyword" >
                                                </div> 
                                                <div class="form-group">
                                                    <label for="">Meta Title</label>
                                                    <input type="text"  class="form-control"  name="blog_meta_title" >
                                                </div> 
                                                <div class="form-group">
                                                    <label for="">Meta Decreption</label>
                                                    <input type="text"  class="form-control"  name="blog_meta_description" >
                                                </div> 
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Ảnh</label>
                                                    <input type="file"  class="form-control"  name="file_upload" >
                                                    @error('blog_image')
                                                <small class="danger" style="color: red;">{{$message}}</small>
                                               @enderror
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="">Thêm ảnh</label>
                                                    <input type="file"  class="form-control"  name="blog_image_list" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Trạng thái</label>
                                                    <select name="blog_status" class="form-control input-sm m-bot15">
                                                        <option value="1">Hoạt động</option>
                                                        <option value="0">Khóa</option>
                                                    </select>
                                                    @error('blog_status')
                                                <small class="danger" style="color: red;">{{$message}}</small>
                                               @enderror
                                              
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="col-md-5">
                                                        <button type="submit" name="add_blog" class="btn btn-info">Thêm bài viết</button>
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

@section('css')
<link rel="stylesheet" href="{{url('public')}}/backend/bower_components/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
@stop
@section('js')
<script src="{{url('public')}}/backend/bower_components/ckeditor/ckeditor.js"></script>
<script src="{{url('public')}}/backend/bower_components/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="{{url('public')}}/backend/js/custemUrl.js"></script>
<script>
    $(function () {

      CKEDITOR.replace( 'blog_content' );
      //$('#blog_content').wysihtml5()
    })
  </script>
@stop
