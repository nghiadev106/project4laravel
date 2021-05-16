<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $product = Product::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');

        if(isset($cart[$id])){
            $cart[$id]['quantity']=$cart[$id]['quantity']+1;
        }else{
            if($product->product_price_sale>0){
                $cart[$id] = [
                    "name" => $product->name,
                    "quantity" => 1,                
                    "price" => $product->product_price_sale,
                    "image" => $product->product_image
                ];
            }else{
                $cart[$id] = [
                    "name" => $product->name,
                    "quantity" => 1,                
                    "price" => $product->product_price,
                    "image" => $product->product_image
                ];
            }          
        }      
        session()->put('cart', $cart);
        return response()->json(
            [
                'code'=>200,
                'message'=>'success'
            ], 200);   
    }

    public function showCart()
    {
        $product=Product::inRandomOrder()->limit(10)->get();
        $cart=session()->get('cart');
        return view('pages.cart',compact('cart','product'));
    }

    public function addCart(Request $request){
        $product_id = $request->product_id;
        $product_name = $request->product_name;
        $product_price = $request->product_price;
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('message_succes','Thêm giỏ hàng thành công');
        return redirect()->back()->with('success', 'your message here');
    } 

    public function increaseQuantity($rowId)
    {       
        $product=Cart::get($rowId);
        $qty=$product->qty+1;
        Cart::update($rowId,$qty);
        return redirect()->route('cart.showcart');
    }

    public function decreaseQuantity($rowId)
    {
        $product=Cart::get($rowId);
        $qty=$product->qty-1;
        Cart::update($rowId,$qty);
        return redirect()->route('cart.showcart');
    }

    public function delete($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('cart.showcart');
    }

}
