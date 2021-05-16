@extends('layout_home')
@section('content')
<!--main area-->
<main id="main" class="main-site">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{route('home.index')}}" class="link">Trang chủ</a></li>
                <li class="item-link"><span>Giỏ hàng</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            @php
                $total=0;
            @endphp
            @if(Cart::count() > 0)
                <div class="wrap-iten-in-cart">
                
                    <h3 class="box-title">Tên sản phẩm</h3>
                    <ul class="products-cart">
                        
                        @foreach (Cart::content() as $item)
                            {{-- @php
                                $total+= $cartItem['price']*$cartItem['quantity'];
                            @endphp --}}
                        <li class="pr-cart-item">
                            <div class="product-image">
                                <figure><img src="{{url('public/uploads/products')}}/{{$item->model->product_image}}" alt=""></figure>
                            </div>
                            <div class="product-name">
                                <a class="link-to-product" href="{{URL::to('/product/'.$item->model->slug.'/'.$item->model->id)}}">{{ $item->model->name}}</a>
                            </div>
                            @if(number_format( $item->model->product_price_sale)>0)
                                <div class="price-field produtc-price"><p class="price">{{number_format( $item->model->product_price_sale)}}đ</p></div>
                            @else
                                <div class="price-field produtc-price"><p class="price">{{number_format( $item->model->product_price)}}đ</p></div>
                            @endif
                            <div class="quantity">
                                <div class="quantity-input">
                                    <input type="text" name="product-quatity" value="{{$item->qty}}" data-max="120" pattern="[0-9]*" >									
                                    <a class="btn btn-increase" href="{{route('cart.increase',$item->rowId)}}"></a>
                                    <a class="btn btn-reduce" href="{{route('cart.decrease',$item->rowId)}}"></a>
                                </div>
                            </div>
                            <div class="price-field sub-total"><p class="price">{{number_format( $item->subtotal)}}</p></div>
                            <div class="delete">
                                <a href="{{route('cart.delete',$item->rowId)}}" class="btn btn-delete" title="">
                                    <span>Delete from your cart</span>
                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                                </a>
                            </div>
                        </li>
                        @endforeach		
                        <form action="" method="POST" id="form-increase">
                            @csrf
                        </form>	
                        <form action="" method="POST" id="form-decrease">
                            @csrf
                        </form>	
                        <form action="" method="POST" id="form-delete">
                            @csrf
                        </form>							
                    </ul>
                
                </div>

                <div class="summary">
                    <div class="order-summary">
                        <h4 class="title-box">Tóm tắt đơn hàng</h4>
                        <p class="summary-info"><span class="title">Subtotal</span><b class="index">{{number_format(Cart::subtotal(0,'.',''))}}đ</b></p>
                        <p class="summary-info"><span class="title">Tax</span><b class="index">{{number_format(Cart::tax(0,'.',''))}}đ</b></p>
                        <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                        <p class="summary-info total-info "><span class="title">Total</span><b class="index">{{number_format(Cart::total(0,'.',''))}}đ</b></p>
                    </div>
                    <div class="checkout-info">
                        <label class="checkbox-field">
                            <input class="frm-input " name="have-code" id="have-code" value="" type="checkbox"><span>I have promo code</span>
                        </label>
                        <a class="btn btn-checkout" href="{{route('checkout')}}">Check out</a>
                        <a class="link-to-shop" href="shop.html">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                    <div class="update-clear">
                        <a class="btn btn-clear" href="#">Clear Shopping Cart</a>
                        <a class="btn btn-update" href="#">Update Shopping Cart</a>
                    </div>
                </div>
            @else                    
            <div class="text-center" style="padding: 30px 0">
                <h3>Không có sản phẩm nào trong giỏ hàng</h3>
                <p>Tiếp tục mua sắm</p>
                <a href="{{route('home.index')}}" class="btn btn-success">Shop Now</a>
            </div>
        @endif

            <div class="wrap-show-advance-info-box style-1 box-in-site">
                <h3 class="title-box">Most Viewed Products</h3>
                <div class="wrap-products">
                    <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >
                        @foreach($product as $key => $pro)
                        <div class="product product-style-2 equal-elem ">
                            <form action="{{route('cart.addcart')}}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="product_id" id="product_id" value="{{ $pro->id }}">
                                <input type="hidden" name="product_name" id="product_name" value="{{ $pro->name }}">
                               
                                <div class="product-thumnail">
                                <a href="{{URL::to('/product/'.$pro->slug.'/'.$pro->id)}}" title="{{ $pro->name }}">
                                    <figure><img src="{{url('public/uploads/products')}}/{{ $pro->product_image }}" style="height: 214px;width:214px;"  alt="{{ $pro->name }}"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="{{URL::to('/product/'.$pro->slug.'/'.$pro->id)}}" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="{{URL::to('/product/'.$pro->slug.'/'.$pro->id)}}" class="product-name"><span>{{ $pro->name }}</span></a>
                                @if ($pro->product_price_sale > 0){
                                    <input type="hidden" name="product_price" value="{{ $pro->product_price_sale }}">
                                    <div class="wrap-price"><ins><p class="product-price">{{ $pro->product_price_sale }}</p></ins> <del><p class="product-price">{{ $pro->product_price }}</p></del></div>
                                }
                                @else{
                                    <input type="hidden" name="product_price" value="{{ $pro->product_price }}">
                                    <div class="wrap-price"><span class="product-price">{{ $pro->product_price}}</span></div>
                                }
                                @endif
                            </div>
                            <div class="wrap-butons">
                                <button type="submit" class="btn add-to-cart">Add to Cart</button>                        
                            </div>
                        </form>
                        </div>  
                        @endforeach     
                    </div>
                </div><!--End wrap-products-->
            </div>

        </div><!--end main content area-->
    </div><!--end container-->

</main>
<!--main area-->
@stop

@section('js')
<script>
    $('.btn-increase').click(function(ev){
            ev.preventDefault();
            var _href=$(this).attr('href');
            $('form#form-increase').attr('action',_href);
            $('form#form-increase').submit();
        });

    $('.btn-reduce').click(function(ev){
            ev.preventDefault();
            var _href=$(this).attr('href');
            $('form#form-decrease').attr('action',_href);
            $('form#form-decrease').submit();
        });
    $('.btn-delete').click(function(ev){
            ev.preventDefault();
            var _href=$(this).attr('href');
            $('form#form-delete').attr('action',_href);
            $('form#form-delete').submit();
        });    
        
</script>  
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