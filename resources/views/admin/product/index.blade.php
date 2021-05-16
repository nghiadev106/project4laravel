@extends('admin.layout_admin')
@section('admin_content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="#">Sản phẩm</a></li>
            <li class="active">Danh sách sản phẩm </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header col-xs-8">
                        <h3 class="box-title"> <a class="btn btn-primary" href="{{ route('product.create') }}">Thêm mới</a></h3>
                    </div>
                   <div class="box-header col-xs-4">
                    <form class="form-inline">                      
                        <div class="form-group mx-sm-3 mb-2">
                          <input type="text" class="form-control" name="search" placeholder="Tìm kiếm ...">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Tìm kiếm</button>
                      </form>
                   </div>
                   <div class="col-xs-12">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                        @if ($message = Session::get('error'))
                        <div class="alert alert-error">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Slug</th>
                                    <th>Danh mục</th>
                                    <th>Giá</th>
                                    <th>Giá sale</th>
                                    <th>Mô tả</th>
                                    <th>Trạng thái</th>
                                    <th>Ảnh</th>
                                    <th>#</th>
                            </thead>
                            <tbody>
                                  @foreach($product as $key => $pro)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>{{ $pro->name }}</td>
                                            <td>{{ $pro->slug }}</td>
                                            <td>{{ $pro->category->name }}</td>
                                            <td>{{ $pro->product_price }}</td>
                                            <td>{{ $pro->product_price_sale }}</td>
                                            <td>{{ $pro->product_desc }}</td>
                                            <td>
                                            	 <?php
										               if($pro->product_status==0){
										                ?>
										                <a href="{{URL::to('/unactive-product/'.$pro->product_id)}}" class="btn-danger">Đang khóa</a>
										                <?php
										                 }else{
										                ?>  
										                 <a href="{{URL::to('/active-product/'.$pro->product_id)}}" class="btn-success">Còn hàng</span></a>
										                <?php
										               }
										              ?>
                                            </td>
                                            <td><img src="{{url('public/uploads/products')}}/{{ $pro->product_image }}" width="80" alt="{{ $pro->product_name }}"></td>
                                            <td>
                                            <a class="btn btn-success glyphicon glyphicon-edit" href="{{ route('product.edit',$pro->id) }}"></a>
                                            <a class="btn btn-danger glyphicon glyphicon-trash btndelete" onclick="return confirm('Bạn có muốn xóa không?');" href="{{ route('product.destroy',$pro->id) }}"></a>
                                             </td>
                                        </tr>
                              @endforeach
                            </tbody>
                        </table>
                        <div>
                            {{$product->appends(request()->all())->links()}}
                        </div>
                        <form action="" method="POST" id="form-delete">
                            @csrf @method('DELETE')
                        </form>
                    </div>
                    <!-- /.box-body -->
               
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
    <script>
        $('.btndelete').click(function(ev){
            ev.preventDefault();
            var _href=$(this).attr('href');
            $('form#form-delete').attr('action',_href);
            $('form#form-delete').submit();
        })
    </script>
@stop