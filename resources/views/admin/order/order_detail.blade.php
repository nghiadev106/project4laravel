@extends('admin.layout_admin')
@section('admin_content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Chi tiết hóa đơn
        <small>#007612</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">  Chi tiết hóa đơn</li>
      </ol>
    </section> 
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> FShop
            <small class="pull-right">Ngày: {{ $order->created_at->format('d/m/Y')}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>Đỗ Văn Nghĩa</strong><br>
            Yên Mỹ-Hưng Yên<br>
            Phone: 0333749728<br>
            Email: nghiadv1006@gmail.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong>{{ $order->name}}</strong><br>
            {{ $order->address}}<br>
            Phone: {{ $order->mobile}}<br>
            Email: {{ $order->email}}
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Order ID:</b> {{ $order->id}}<br>
          <b>Payment Due:</b> {{ $order->created_at->format('d/m/Y')}}<br>
          <b>Account:</b> {{ $order->name}}
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Tên sản phẩm</th>
              <th>Số lượng</th>
              <th>Giá</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
              @php
              $subtotal = 0;
              $total=0;
          @endphp
                @foreach($order_detail as $key => $item)
                @php
                    $subtotal = $item->quantity*$item->price;
		              	$total+=$subtotal;
                @endphp
                    <tr>
                        <td>{{ $item->product->name}}</td>
                        <td>{{ $item->quantity}}</td>
                        <td>{{ number_format($item->price)}} đ</td>
                        <td>{{  number_format($subtotal) }} đ</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Payment Methods:</p>
          <img src="{{url('public')}}/backend/dist/img/credit/visa.png" alt="Visa">
          <img src="{{url('public')}}/backend/dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="{{url('public')}}/backend/dist/img/credit/american-express.png" alt="American Express">
          <img src="{{url('public')}}/backend/dist/img/credit/paypal2.png" alt="Paypal">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Amount Due 2/22/2021</p>

          <div class="table-responsive">
            <table class="table">
        
              <tr>
                <th>Total:</th>
                <td>{{ number_format(	$total)}} đ</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="{{route('print',$order->id)}}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <a href="{{route('order.print',$order->id)}}" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </a>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->
@endsection
