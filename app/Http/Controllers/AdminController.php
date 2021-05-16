<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Blog;
use App\Models\User;
use App\Models\Order;

class AdminController extends Controller
{
     public function index()
    {
        $product = Product::where('product_status',1)->get();
        $blogs = Blog::where('blog_status',1)->get();
        $orders = Order::all();
        $users = User::all();
        return View('admin.home.dashboard',compact('product','blogs','users','orders'));
    }

    public function file()
    {
        return View('admin.file.file');
    }
}
