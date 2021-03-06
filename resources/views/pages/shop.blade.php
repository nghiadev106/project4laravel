@extends('layout_home')
@section('content')
<!--main area-->
<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{route('home.index')}}" class="link">home</a></li>
                <li class="item-link"><span>Digital & Electronics</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <div class="banner-shop">
                    <a href="#" class="banner-link">
                        <figure><img src="{{url('public')}}/frontend/images/shop-banner.jpg" alt=""></figure>
                    </a>
                </div>
                <div class="wrap-shop-control">
                    <h1 class="shop-title">Digital & Electronics</h1>
                    <div class="wrap-right">
                        <div class="sort-item orderby ">
                            <select name="orderby" class="use-chosen" >
                                <option value="menu_order" selected="selected">Default sorting</option>
                                <option value="popularity">Sort by popularity</option>
                                <option value="rating">Sort by average rating</option>
                                <option value="date">Sort by newness</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>
                        </div>

                        <div class="sort-item product-per-page">
                            <select name="post-per-page" class="use-chosen" >
                                <option value="12" selected="selected">12 per page</option>
                                <option value="16">16 per page</option>
                                <option value="18">18 per page</option>
                                <option value="21">21 per page</option>
                                <option value="24">24 per page</option>
                                <option value="30">30 per page</option>
                                <option value="32">32 per page</option>
                            </select>
                        </div>

                        <div class="change-display-mode">
                            <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
                            <a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
                        </div>

                    </div>

                </div><!--end wrap shop control-->

                <div class="row">

                    <ul class="product-list grid-products equal-container">
                        @foreach($product as $key => $pro)
                            <form action="{{route('cart.addcart')}}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="product_id" id="product_id" value="{{ $pro->id }}">
                                <input type="hidden" name="product_name" id="product_name" value="{{ $pro->name }}">
                                <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                                    <div class="product product-style-3 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="{{URL::to('/product/'.$pro->slug.'/'.$pro->id)}}" title="{{ $pro->name}}">
                                                <figure><img src="{{url('public/uploads/products')}}/{{ $pro->product_image }}" style="height: 214px;width:214px;" alt="{{ $pro->name}}"></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{URL::to('/product/'.$pro->slug.'/'.$pro->id)}}" class="product-name"><span>{{ $pro->name}}</span></a>
                                            @if ($pro->product_price_sale > 0)
                                                <input type="hidden" name="product_price" value="{{ $pro->product_price_sale }}">
                                                <div class="wrap-price"><ins><p class="product-price">{{ $pro->product_price_sale }}</p></ins> <del><p class="product-price">{{ $pro->product_price }}</p></del></div>
                                            @else
                                                <input type="hidden" name="product_price" value="{{ $pro->product_price }}">
                                                <div class="wrap-price"><span class="product-price">{{ $pro->product_price}}</span></div>
                                            @endif
                                            <div class="wrap-butons">
                                                <button type="submit" class="btn add-to-cart">Add to Cart</button>       
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </form> 
                        @endforeach
                    </ul>

                </div>

                <div class="wrap-pagination-info">
                    {{$product->appends(request()->all())->links()}}
                    {{-- <ul class="page-numbers">
                        <li><span class="page-number-item current" >1</span></li>
                        <li><a class="page-number-item" href="#" >2</a></li>
                        <li><a class="page-number-item" href="#" >3</a></li>
                        <li><a class="page-number-item next-link" href="#" >Next</a></li>
                    </ul> --}}
                    <p class="result-count">Showing 1-8 of 12 result</p>
                </div>
            </div><!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget mercado-widget categories-widget">
                    <h2 class="widget-title">All Categories</h2>
                    <div class="widget-content">
                        <ul class="list-category">
                            @foreach ($categories as $category)
                            <li class="category-item has-child-cate">
                                
                                @if($category->categoryChildrent->count())
                                <a href="#" class="cate-link">{{$category->name}}</a>
                                <span class="toggle-control">+</span>
                                @else
                                <a href="{{URL::to('/category/'.$category->slug.'/'.$category->id)}}" class="cate-link">{{$category->name}}</a>
                                @endif      
                                @foreach($category->categoryChildrent as $categoryChilrent)
                                <ul class="sub-cate">
                                    <li class="category-item"><a href="{{URL::to('/category/'.$categoryChilrent->slug.'/'.$categoryChilrent->id)}}" class="cate-link">{{$categoryChilrent->name}}</a></li>
                                </ul>   
                                <input type="hidden" name="category_id" value="{{$categoryChilrent->id}}">                                  
                            @endforeach                    
                            </li>
                            @endforeach
                        </ul>
                    </div>
              

                

                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Popular Products</h2>
                    <div class="widget-content">
                        <ul class="products">
                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{url('public')}}/frontend/images/products/digital_01.jpg" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{url('public')}}/frontend/images/products/digital_17.jpg" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{url('public')}}/frontend/images/products/digital_18.jpg" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{url('public')}}/frontend/images/products/digital_20.jpg" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div><!-- brand widget-->

            </div><!--end sitebar-->

        </div><!--end row-->

    </div><!--end container-->

</main>
<!--main area-->
@stop
@section('css')
<style type="text/css">
    .add-to-cart {
    display: inline-block;
    width: 100%;
    font-size: 14px;
    line-height: 34px;
    color: #888888;
    background: #f5f5f5;
    border: 1px solid #e6e6e6;
    text-align: center;
    font-weight: 600;
    border-radius: 0;
    padding: 2px 10px;
    -webkit-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
    -moz-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
    margin-top: 14px;
}
.add-to-cart:hover{
    display: inline-block;
    width: 100%;
    font-size: 14px;
    line-height: 34px;
    color: white;
    background: #ff2832;
    border: 1px solid #e6e6e6;
    text-align: center;
    font-weight: 600;
    border-radius: 0;
    padding: 2px 10px;
    -webkit-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
    -moz-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
    margin-top: 14px;
}
</style>
@stop
