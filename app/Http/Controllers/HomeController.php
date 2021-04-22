<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{     
    public function index()
    {
        $product_sale = Product::orderBy('created_at','ASC')->where('product_price_sale','>',0)->where('product_status',1)->paginate(10);
        $product_latest = Product::orderBy('created_at','ASC')->where('product_status',1)->paginate(10);
        return View('pages.home',compact('product_sale','product_latest'));
    }

    public function shop()
    {
        $product = Product::orderBy('created_at','ASC')->where('product_status',1)->search()->paginate(12);
        $categories = Category::where('parent_id', 0)->where('category_status',1)->get();
        return view('pages.shop',compact('product','categories'))
            ->with((request()->input('page', 1) - 1) * 5);
    }

    public function category(Request $request)
    {
        $category_id = $request->route('id');
        $product = Product::orderBy('created_at','ASC')->where('category_id',$category_id)->where('product_status',1)->search()->paginate(12);
        $categories = Category::where('parent_id', 0)->where('category_status',1)->get();
        return view('pages.category',compact('product','categories'))
            ->with((request()->input('page', 1) - 1) * 5);
    }

    public function detail(Request $request)
    {
        $id = $request->route('id');
        $product =Product::where('id',$id)->where('product_status',1)->first();
        $product_sale = Product::orderBy('created_at','ASC')->where('product_price_sale','>',0)->where('product_status',1)->get()->take(5);
        $related_product=Product::where('id','!=',$id)->where('category_id',$product->category_id)->where('product_status',1)->get()->take(10);
        return View('pages.detail',compact('product','related_product','product_sale'));
    }


}
