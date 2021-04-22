@extends('admin.layout_admin')
@section('admin_content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh mục sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="#">Danh mục sản phẩm</a></li>
            <li class="active">Danh sách danh mục </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header col-xs-8">
                        <h3 class="box-title"> <a class="btn btn-primary" href="{{ route('category.create') }}">Thêm mới</a></h3>
                    </div>
                   <div class="box-header col-xs-4">
                    <form class="form-inline">                      
                        <div class="form-group mx-sm-3 mb-2">
                          <input type="text" class="form-control" name="key" placeholder="Tìm kiếm ...">
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
                                    <th>Tên danh mục</th>
                                    <th>mô tả</th>
                                    <th>Vị trí</th>
                                    <th>Số sản phẩm</th>
                                    <th>Ngày tạo</th>
                                    <th>Trạng thái</th>
                                    <th>#</th>
                            </thead>
                            <tbody>
                                  @foreach($product_category as $key => $cate)
                                        <tr>
                                            <td>{{++$i}}</td>

                                            <td>{{ $cate->name }}</td>
                                            <td>
                                                {{ $cate->category_desc }}
                                            </td>
                                            <td>{{ $cate->category_order }}</td>
                                            <td>{{ $cate->products ? $cate->products->count():0}}</td>
                                            <td>{{ $cate->created_at->format('d-m-Y') }}</td>
                                            <td>
                                            	 <?php
										               if($cate->category_status==0){
										                ?>
										                <a href="{{URL::to('/unactive-category-product/'.$cate->category_id)}}" class="btn-danger">Đang khóa</a>
										                <?php
										                 }else{
										                ?>  
										                 <a href="{{URL::to('/active-category-product/'.$cate->category_id)}}" class="btn-success">Hoạt động</span></a>
										                <?php
										               }
										              ?>
                                            </td>
                                            <td>
                                            <a class="btn btn-success glyphicon glyphicon-edit" href="{{ route('category.edit',$cate->id) }}"></a>
                                                <a class="btn btn-danger glyphicon glyphicon-trash btndelete" onclick="return confirm('Bạn có muốn xóa không?');" href="{{ route('category.destroy',$cate->id) }}"></a>
                                             </td>
                                        </tr>
                              @endforeach
                            </tbody>
                        </table>
                        <div>
                            {{$product_category->appends(request()->all())->links()}}
                        </div>
                        <form action="" method="POST" id="form-delete">
                            @csrf @method('DELETE')
                        </form>
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
    <script>
        $('.btndelete').click(function(ev){
            ev.preventDefault();
            var _href=$(this).attr('href');
            $('form#form-delete').attr('action',_href);
            $('form#form-delete').submit();
        })
    </script>
@stop