<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;

class CheckoutController extends Controller
{
    public function checkout(){
        if(Auth::check()){
            $product=Product::inRandomOrder()->limit(10)->get();
            return view('pages.checkout',compact('product'));
        }else{
            return redirect()->route('login');
        }
    }

    public function send_checkout(Request $request)
    {
       
        $total=Cart::tax();
        $subtotal=Cart::subtotal();
        $tax=Cart::tax();

        $user_id=Auth::user()->id;
        $user_name=Auth::user()->name;
        $user_email=Auth::user()->email;
        $address=$request->user_address;
        $phone=$request->user_phone;
        $message=$request->user_message;
        if($order=Order::create([
            'user_id'=>$user_id,
            'name'=>$user_name,
            'email'=>$user_email,
            'address'=>$address,
            'mobile'=>$phone,
            'message'=>$message
            //'subtotal'=>$subtotal,
           // 'total'=>$total,
           // 'tax'=>$tax
        ])){
            $order_id=$order->id;
            $cart=session()->get('cart');
            
            foreach(Cart::content() as $item ){
                $product_id=$item->id;
                $quantity=$item->qty;
                $price=$item->price;
                OrderDetail::create([
                    'order_id'=>$order_id,
                    'product_id'=>$product_id,
                    'price'=>$price,
                    'quantity'=>$quantity
                ]);
            }
            Cart::destroy();
            return redirect()->route('checkout.success')->with('success','Thanh toán thành công');    
        }
        return redirect()->back()->with('error','Thanh toán không thành công');       
    }
    public function checkout_success(){
        return view('pages.checkout_success');
    }
}
