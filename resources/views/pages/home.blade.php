@extends('layout_home')
@section('content')
<main id="main">
    <div class="container">

        <!--MAIN SLIDE-->
        <div class="wrap-main-slide">
            <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
                <div class="item-slide">
                    <img src="{{url('public')}}/frontend//images/main-slider-1-1.jpg" alt="" class="img-slide">
                    <div class="slide-info slide-1">
                        <h2 class="f-title">Kid Smart <b>Watches</b></h2>
                        <span class="subtitle">Compra todos tus productos Smart por internet.</span>
                        <p class="sale-info">Only price: <span class="price">$59.99</span></p>
                        <a href="#" class="btn-link">Shop Now</a>
                    </div>
                </div>
                <div class="item-slide">
                    <img src="{{url('public')}}/frontend/images/main-slider-1-2.jpg" alt="" class="img-slide">
                    <div class="slide-info slide-2">
                        <h2 class="f-title">Extra 25% Off</h2>
                        <span class="f-subtitle">On online payments</span>
                        <p class="discount-code">Use Code: #FA6868</p>
                        <h4 class="s-title">Get Free</h4>
                        <p class="s-subtitle">TRansparent Bra Straps</p>
                    </div>
                </div>
                <div class="item-slide">
                    <img src="{{url('public')}}/frontend/images/main-slider-1-3.jpg" alt="" class="img-slide">
                    <div class="slide-info slide-3">
                        <h2 class="f-title">Great Range of <b>Exclusive Furniture Packages</b></h2>
                        <span class="f-subtitle">Exclusive Furniture Packages to Suit every need.</span>
                        <p class="sale-info">Stating at: <b class="price">$225.00</b></p>
                        <a href="#" class="btn-link">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>

        <!--BANNER-->
        <div class="wrap-banner style-twin-default">
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="{{url('public')}}/frontend//images/home-1-banner-1.jpg" alt="" width="580" height="190"></figure>
                </a>
            </div>
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="{{url('public')}}/frontend//images/home-1-banner-2.jpg" alt="" width="580" height="190"></figure>
                </a>
            </div>
        </div>

        <!--On Sale-->
        <div class="wrap-show-advance-info-box style-1 has-countdown">
            <h3 class="title-box">Đang giảm giá</h3>
            <div class="wrap-countdown mercado-countdown" data-expire="2020/12/12 12:34:56"></div>
            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                @foreach($product_sale as $key => $pro)
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
                        <button type="submit" class="btn add-to-cart">Thêm giỏ hàng</button>
                    </div>
                </form>
                </div>
                @endforeach
            </div>
        </div>

        <!--Latest Products-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">SẢN PHẨM MỚI NHẤT</h3>
            <div class="wrap-top-banner">
                <a href="" class="link-banner banner-effect-2">
                    <figure><img src="{{url('public')}}/frontend//images/digital-electronic-banner.jpg" width="1170" height="240" alt=""></figure>
                </a>
            </div>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-contents">
                        <div class="tab-content-item active" id="digital_1a">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                                @foreach($product_latest as $key => $pro)
                                    <div class="product product-style-2 equal-elem ">
                                        <form action="{{route('cart.addcart')}}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="product_id" id="product_id" value="{{ $pro->id }}">
                                            <input type="hidden" name="product_name" id="product_name" value="{{ $pro->name }}">

                                            <div class="product-thumnail">
                                                <a href="{{URL::to('/product/'.$pro->slug.'/'.$pro->id)}}" title="{{ $pro->name}}">
                                                    <figure><img src="{{url('public/uploads/products')}}/{{ $pro->product_image }}" style="height: 214px;width:214px;" alt="{{ $pro->name}}"></figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item new-label">new</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="{{URL::to('/product/'.$pro->slug.'/'.$pro->id)}}" class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="{{URL::to('/product/'.$pro->slug.'/'.$pro->id)}}" class="product-name"><span>{{ $pro->slug}}</span></a>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Product Categories-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">Tin tức</h3>
            <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="{{url('public')}}/frontend//images/fashion-accesories-banner.jpg" width="1170" height="240" alt=""></figure>
                </a>
            </div>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-control">
                        <a href="#fashion_1a" class="tab-control-item active">Tin mới nhất</a>

                    </div>
                    <div class="tab-contents">
                        <div class="tab-content-item active" id="fashion_1a">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                                @foreach($blogs as $key => $blog)
                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="{{URL::to('/blog/'.$blog->slug.'/'.$blog->id)}}" title="{{$blog->name}}">
                                                <figure><img src="{{url('public/uploads/blogs')}}/{{ $blog->blog_image }}" width="800" height="800" alt="{{$blog->name}}"></figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>{{$blog->name}}</span></a>
                                            <div class="wrap-price"> <a href="{{URL::to('/blog/'.$blog->slug.'/'.$blog->id)}}" title="{{$blog->name}}">chi tiết</a></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</main>
@endsection
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

@section('js')
<script>
    function addToCart(event){
        event.preventDefault();
        let url=$(this).data('url');
        alert(url);

        $.ajax({
            type:"GET",
            url:url,
            dataType:'json',
            success:function(data){
                // if(data.code===200){
                //     //alert('Thêm giỏ hàng thành công');
                // }
            },error:function(){
                alert('Thêm giỏ hàng không thành công');
            }
        });
    }
    $(function(){
        $('.add-cart').on('click',addToCart)
    });
</script>
@stop
