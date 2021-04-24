<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $cart=session()->get('cart');
        return view('pages.cart',compact('cart'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Order  $order
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Order $order)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Order  $order
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Order $order)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Order  $order
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Order $order)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Order  $order
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Order $order)
    // {
    //     //
    // }
}
