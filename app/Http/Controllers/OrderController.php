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
        session()->flush();
        $product = Product::find($id);
        //dd($product);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {    
            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->product_price,
                    "image" => $product->product_image
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->product_price,
            "image" => $product->product_image
        ];
        session()->put('cart', $cart);
        dd($cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');       
    }
    // public function index()
    // {
    //     //
    // }

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
