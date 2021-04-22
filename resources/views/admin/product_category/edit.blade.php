@extends('admin.layout_admin')
@section('admin_content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sửa danh mục
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="#">Danh mục sản phẩm</a></li>
            <li class="active">Sửa mục sản phẩm</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                 
                    <div class="position-center">
                                <form role="form" action="{{ route('category.update',$category->id) }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" value="{{$category->id}}"  name="id">
                                <div class="form-group">
                                    
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text"  class="form-control" value="{{$category->name}}"  name="name" id="name">
                                    @error('name')
                                        <small class="danger" style="color: red;">{{$message}}</small>
                                     @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Link</label>
                                    <input type="text"  class="form-control" value="{{$category->slug}}"  name="slug" id="slug">
                                    @error('slug')
                                        <small class="danger" style="color: red;">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Thứ tự hiển thị</label>
                                    <input type="text"  class="form-control" value="{{$category->category_order}}"  name="category_order">
                                    @error('category_order')
                                    <small class="danger" style="color: red;">{{$message}}</small>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="8"class="form-control" name="category_desc">{{$category->category_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thuộc danh mục</label>
                                      <select name="parent_id" class="form-control input-sm m-bot15">
                                        <option value="0">---Danh mục cha---</option>
                                        @foreach($categories as $cat)
                                             <option value="{{ $cat->id }}"  @if($cat->id==$category->parent_id) selected='selected' @endif >{{ $cat->name }}</option>
                                         @endforeach  
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="category_status" class="form-control input-sm m-bot15">
                                          @if($category->category_status==1){
                                            <option value="1" selected>Hiển thị</option>
                                            <option value="0">Ẩn</option>
                                          }
                                          @else{
                                            <option value="1">Hiển thị</option>
                                            <option value="0" selected>Ẩn</option>
                                          }
                                        @endif
                                    </select>
                                </div>
                                @error('category_status')
                                        <small class="danger" style="color: red;">{{$message}}</small>
                                    @enderror
                                    <div class="form-group">
                                        <div class="col-md-2">                                 
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" name="edit_category" class="btn btn-info">Sửa danh mục</button>
                                        </div>
                                        <div class="col-md-5">
                                            <a class="btn btn-danger" href="{{ route('category.index') }}">Quay lại</a>
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

@section('js')
<script src="{{url('public')}}/backend/js/custemUrl.js"></script>
@stop