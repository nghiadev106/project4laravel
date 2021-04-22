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

      CKEDITOR.replace( 'product_content' );
      //$('#product_content').wysihtml5()
    })
  </script>
@stop
@section('admin_content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm mới sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="#">Sản phẩm</a></li>
            <li class="active">Thêm sản phẩm</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">         
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">                       
                        <div class="position-center">
                                    <form role="form" action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" value="{{$product->id}}"  name="id">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <label for="">Tên sản phẩm</label>
                                                    <input type="text"  class="form-control" value="{{$product->name}}"  name="name" id="name" >
                                                    @error('name')
                                                        <small class="danger" style="color: red;">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Link</label>
                                                    <input type="text"  class="form-control" value="{{$product->slug}}"  name="slug" id="slug">
                                                    @error('slug')
                                                        <small class="danger" style="color: red;">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Mô tả</label>
                                                    <textarea style="resize: none" rows="4" class="form-control" name="product_desc" placeholder="Mô tả danh mục">{{$product->product_desc}}</textarea>
                                                    @error('product_desc')
                                                    <small class="danger" style="color: red;">{{$message}}</small>
                                                   @enderror 
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Nội dung</label>
                                                    <textarea type="text" id="product_content" class="form-control"  name="product_content" >{{$product->product_content}}</textarea>
                                                    @error('product_content')
                                                    <small class="danger" style="color: red;">{{$message}}</small>
                                                   @enderror 
                                                </div>   
                                               
                                                <div class="form-group">
                                                    <label for="">Tag</label>
                                                    <input type="text" value="{{$product->product_tag}}"  class="form-control"  name="product_tag" >
                                                </div> 
                                                <div class="form-group">
                                                    <label for="">Meta Keyword</label>
                                                    <input type="text" value="{{$product->product_meta_keyword}}"  class="form-control"  name="product_meta_keyword" >
                                                </div> 
                                                <div class="form-group">
                                                    <label for="">Meta Title</label>
                                                    <input type="text" value="{{$product->product_meta_title}}"  class="form-control"  name="product_meta_title" >
                                                </div> 
                                                <div class="form-group">
                                                    <label for="">Meta Decreption</label>
                                                    <input type="text" value="{{$product->product_meta_description}}"  class="form-control"  name="product_meta_description" >
                                                </div> 
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Thuộc danh mục</label>
                                                    <select name="category_id" class="form-control input-sm m-bot15">
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}"  @if($category->id==$product->category_id) selected='selected' @endif >{{ $category->name }}</option>
                                                        @endforeach      
                                                    </select>
                                                    @error('category_id')
                                                    <small class="danger" style="color: red;">{{$message}}</small>
                                                   @enderror     
                                                </div>  
                                                                                      
                                                <div class="form-group">
                                                    <label for="">Giá sản phẩm</label>
                                                    <input type="number" value="{{$product->product_price}}"  class="form-control"  name="product_price" >
                                                    @error('product_price')
                                                    <small class="danger" style="color: red;">{{$message}}</small>
                                                   @enderror
                                                </div>
                                               
                                                <div class="form-group">
                                                    <label for="">Giá khuyến mãi</label>
                                                    <input type="number" value="{{$product->product_price_sale}}"  class="form-control"  name="product_price_sale" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Ảnh</label>
                                                    <input type="file" value="{{$product->product_image}}"  class="form-control"  name="file_upload" >
                                                    @error('product_image')
                                                <small class="danger" style="color: red;">{{$message}}</small>
                                               @enderror
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="">Thêm ảnh</label>
                                                    <input type="file" value="{{$product->product_image_list}}"  class="form-control"  name="product_image_list" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Trạng thái</label>
                                                    <select name="product_status" class="form-control input-sm m-bot15">
                                                        @if($product->product_status==1){
                                                            <option value="1" selected>Hiển thị</option>
                                                            <option value="0">Ẩn</option>
                                                          }
                                                          @else{
                                                            <option value="1">Hiển thị</option>
                                                            <option value="0" selected>Ẩn</option>
                                                          }
                                                        @endif
                                                    </select>
                                                    @error('product_status')
                                                <small class="danger" style="color: red;">{{$message}}</small>
                                               @enderror
                                              
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="col-md-5">
                                                        <button type="submit" name="add_product" class="btn btn-info">Sửa sản phẩm</button>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <a class="btn btn-danger" href="{{ route('product.index') }}">Quay lại</a>
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

