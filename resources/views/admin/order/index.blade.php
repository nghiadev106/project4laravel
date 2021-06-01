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
                                    <th>Tên Khách hàng</th>
                                    <th>Email</th>
                                    <th>Số điện thại</th>
                                    <th>Địa chỉ</th>
                                    <th>Ghi chú</th>
                                    <th>Ngày tạo</th>
                                    <th>Trạng thái</th>
                                    <th>#</th>
                            </thead>
                            <tbody>
                                  @foreach($orders as $key => $item)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->mobile }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->message }}</td>
                                            <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                <div class="form-group">
       
                                                    <select name="product_status" class="form-control input-sm m-bot15">
                                                        @if($item->status==1){
                                                            <option value="1" selected>Đang xử lý</option>
                                                            <option value="0">Hủy đơn hàng</option>
                                                            <option value="2">Thành công</option>
                                                          }
                                                          @elseif($item->status==0){
                                                            <option value="1">Đang xử lý</option>
                                                            <option value="0" selected>Hủy đơn hàng</option>
                                                            <option value="2">Thành công</option>
                                                          }@else{
                                                            <option value="1">Đang xử lý</option>
                                                            <option value="0" >Hủy đơn hàng</option>
                                                            <option value="2" selected>Thành công</option>
                                                          }
                                                        @endif
                                                    </select>
                                                  
                                              
                                                </div>
                                            </td>                                 
                                           <td> <a class="btn btn-warning glyphicon glyphicon-eye-open" href="{{ route('order.detail',$item->id) }}"></a></td>
                                        </tr>
                              @endforeach
                            </tbody>
                        </table>
                        <div>
                            {{$orders->appends(request()->all())->links()}}
                        </div>
                      
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
   
@stop