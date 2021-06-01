@extends('layout_home')
@section('content')
<!--main area-->
<main id="main" class="main-site">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">Trang chủ</a></li>
                <li class="item-link"><span>Chi tiết</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <div class="wrap-product-detail">
                    <div class="detail-media">
                        <div class="product-gallery">
                          <ul class="slides">

                            <li data-thumb="{{url('public/uploads/products')}}/{{ $product->product_image }}" style="height: 108px;width:108px;">
                                <img src="{{url('public/uploads/products')}}/{{ $product->product_image }}" alt="product thumbnail" />
                            </li>

                            <li data-thumb="{{url('public')}}/frontend//images/products/digital_17.jpg">
                                <img src="{{url('public')}}/frontend//images/products/digital_17.jpg" alt="product thumbnail" />
                            </li>

                            <li data-thumb="{{url('public')}}/frontend//images/products/digital_15.jpg">
                                <img src="{{url('public')}}/frontend//images/products/digital_15.jpg" alt="product thumbnail" />
                            </li>

                          </ul>
                        </div>
                    </div>
                    <div class="detail-info">
                        <form action="{{route('cart.addcart')}}" method="POST">
                            {{ csrf_field() }}
                        <div class="product-rating">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <a href="#" class="count-review">(05 review)</a>
                        </div>
                        <h2 class="product-name">{{$product->name}}</h2>
                        <div class="short-desc">
                            <ul>
                                <li>7,9-inch LED-backlit, 130Gb</li>
                                <li>Dual-core A7 with quad-core graphics</li>
                                <li>FaceTime HD Camera 7.0 MP Photos</li>
                            </ul>
                        </div>
                        <div class="wrap-social">
                            <a class="link-socail" href="#"><img src="{{url('public')}}/frontend//images/social-list.png" alt=""></a>
                        </div>

                            <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="product_name" id="product_name" value="{{ $product->name }}">

                            @if ($product->product_price_sale > 0)
                                <input type="hidden" name="product_price" value="{{ $product->product_price_sale }}">
                                <div class="wrap-price"><ins><p class="product-price">{{ $product->product_price_sale }}</p></ins> <del><p class="product-price">{{ $product->product_price }}</p></del></div>
                            @else
                                <input type="hidden" name="product_price" value="{{ $product->product_price }}">
                                <div class="wrap-price"><span class="product-price">{{ $product->product_price}}</span></div>
                            @endif

                        <div class="stock-info in-stock">
                            <p class="availability">Availability: <b>In Stock</b></p>
                        </div>
                        <div class="quantity">
                            <span>Quantity:</span>
                            <div class="quantity-input">
                                <input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*" >

                                <a class="btn btn-reduce" href="#"></a>
                                <a class="btn btn-increase" href="#"></a>
                            </div>
                        </div>
                        <div class="wrap-butons">
                            <button type="submit" class="btn add-to-cart">Add to Cart</button>

                        </div>
                    </form>
                    </div>
                    <div class="advance-info">
                        <div class="tab-control normal">
                            <a href="#review" class="tab-control-item">Reviews</a>
                        </div>
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="review">
                                <div class="wrap-review-form">
                                    <div id="review_form_wrapper">
                                        <div id="review_form">
                                            <div id="respond" class="comment-respond">
                                                {!!$product->product_content!!}
                                            </div><!-- .comment-respond-->
                                        </div><!-- #review_form -->
                                    </div><!-- #review_form_wrapper -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget widget-our-services ">
                    <div class="widget-content">
                        <ul class="our-services">

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Free Shipping</b>
                                        <span class="subtitle">On Oder Over $99</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-gift" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Special Offer</b>
                                        <span class="subtitle">Get a gift!</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Order Return</b>
                                        <span class="subtitle">Return within 7 days</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div><!-- Categories widget-->

                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Popular Products</h2>
                    <div class="widget-content">
                        <ul class="products">
                            @foreach ($product_sale as $pro)
                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="{{URL::to('/product/'.$pro->slug.'/'.$pro->id)}}" title="{{$pro->name}}">
                                                <figure><img src="{{url('public/uploads/products')}}/{{ $pro->product_image }}" alt="{{$pro->name}}"></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{URL::to('/product/'.$pro->slug.'/'.$pro->id)}}" class="product-name"><span>{{$pro->name}}</span></a>
                                            {{-- <div class="wrap-price"><ins><p class="product-price">{{ $pro->product_price_sale }}</p></ins> <del><p class="product-price">{{ $pro->product_price }}</p></del></div> --}}
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

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
