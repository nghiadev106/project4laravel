<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use PDF;

class OrderController extends Controller
{
    public function index()
    {     
        $orders = Order::orderBy('created_at','DESC')->paginate(10);
        return view('admin.order.index',compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function detail($id)
    {     
        $order =Order::where('id',$id)->first();
        $order_detail =OrderDetail::where('order_id',$id)->get();
        return view('admin.order.order_detail',compact('order','order_detail'));          
    }

    public function print_order($order_id){
		$pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML($this->print_order_convert($order_id));
		return $pdf->stream();
	}
	public function print_order_convert($order_id){
        $order =Order::where('id',$order_id)->first();
        $order_details =OrderDetail::where('order_id',$order_id)->get();

		$output = '';
		$output.='<style>body{
			font-family: DejaVu Sans;
		}
		.table-styling{
			border:1px solid #000;
			border-collapse: collapse;
            width:100%
		}
		.table-styling tbody tr td{
			border:1px solid #000;
			border-collapse: collapse;
		}
		</style>

		<h2><center>Công ty TNHH một thành viên ĐVN</center></h2>
		<h4><center>Độc lập - Tự do - Hạnh phúc</center></h4>
		<p>Người đặt hàng</p>
		<table class="table-styling" border="1px slolid">
		<thead>
		<tr>
		<th>Tên khách đặt</th>
		<th>Số điện thoại</th>
		<th>Email</th>
        <th>Địa chỉ</th>
		</tr>
		</thead>
		<tbody>';

		$output.='		
		<tr>
		<td  style="text-align:center;width:25%;">'.$order->name.'</td>
		<td style="text-align:center;width:15%;">'.$order->mobile.'</td>
		<td  style="text-align:center;width:25%;">'.$order->email.'</td>
        <td  style="text-align:center;width:35%;">'.$order->address.'</td>
		</tr>';

		$output.='				
		</tbody>

		</table>

		<p>Đơn hàng đặt</p>
		<table class="table-styling" border="1px slolid">
		<thead>
		<tr>
		<th>Tên sản phẩm</th>
		<th>Số lượng</th>
		<th>Giá </th>
		<th>Thành tiền</th>
		</tr>
		</thead>
		<tbody>';

		$total = 0;

		foreach($order_details as $key => $item){

			$subtotal = $item->price*$item->quantity;
			$total+=$subtotal;

			$output.='		
			<tr>
				<td>'.$item->product->name.'</td>
				<td style="text-align:center">'.$item->quantity.'</td>
				<td style="text-align:right">'.number_format($item->price,0,',','.').'đ'.'</td>
				<td style="text-align:right">'.number_format($subtotal,0,',','.').'đ'.'</td>
			</tr>';
		}

	
		$output.= '<tr>
		<td colspan="4">
		<p>Thanh toán : '.number_format($total,0,',','.').'đ'.'</p>
		</td>
		</tr>';
		$output.='				
		</tbody>

		</table>

		<p>Ký tên</p>
		<table>
		<thead>
		<tr>
		<th width="200px">Người lập phiếu</th>
		<th width="800px">Người nhận</th>

		</tr>
		</thead>
		<tbody>';

		$output.='				
		</tbody>

		</table>

		';


		return $output;

	}

	public function print($order_id)
    {     
		$order =Order::where('id',$order_id)->first();
        $order_details =OrderDetail::where('order_id',$order_id)->get();
        return view('admin.order.print_order');
    }	
}
