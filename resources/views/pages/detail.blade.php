@extends('layout_home')
@section('content')
<!--main area-->
<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>detail</span></li>
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

                            <li data-thumb="{{url('public')}}/frontend//images/products/digital_02.jpg">
                                <img src="{{url('public')}}/frontend//images/products/digital_02.jpg" alt="product thumbnail" />
                            </li>

                            <li data-thumb="{{url('public')}}/frontend//images/products/digital_08.jpg">
                                <img src="{{url('public')}}/frontend//images/products/digital_08.jpg" alt="product thumbnail" />
                            </li>

                            <li data-thumb="{{url('public')}}/frontend//images/products/digital_10.jpg">
                                <img src="{{url('public')}}/frontend//images/products/digital_10.jpg" alt="product thumbnail" />
                            </li>

                            <li data-thumb="{{url('public')}}/frontend//images/products/digital_12.jpg">
                                <img src="{{url('public')}}/frontend//images/products/digital_12.jpg" alt="product thumbnail" />
                            </li>

                            <li data-thumb="{{url('public')}}/frontend//images/products/digital_14.jpg">
                                <img src="{{url('public')}}/frontend//images/products/digital_14.jpg" alt="product thumbnail" />
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
                            <div class="wrap-btn">
                                <a href="#" class="btn btn-compare">Add Compare</a>
                                <a href="#" class="btn btn-wishlist">Add Wishlist</a>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="advance-info">
                        <div class="tab-control normal">
                            <a href="#description" class="tab-control-item active">description</a>
                            <a href="#add_infomation" class="tab-control-item">Addtional Infomation</a>
                            <a href="#review" class="tab-control-item">Reviews</a>
                        </div>
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="description">
                                <p>Lorem ipsum dolor sit amet, an munere tibique consequat mel, congue albucius no qui, a t everti meliore erroribus sea. ro cum. Sea ne accusata voluptatibus. Ne cum falli dolor voluptua, duo ei sonet choro facilisis, labores officiis torquatos cum ei.</p>
                                <p>Cum altera mandamus in, mea verear disputationi et. Vel regione discere ut, legere expetenda ut eos. In nam nibh invenire similique. Atqui mollis ea his, ius graecis accommodare te. No eam tota nostrum eque. Est cu nibh clita. Sed an nominavi, et stituto, duo id rebum lucilius. Te eam iisque deseruisse, ipsum euismod his at. Eu putent habemus voluptua sit, sit cu rationibus scripserit, modus taria . </p>
                                <p>experian soleat maluisset per. Has eu idque similique, et blandit scriptorem tatibus mea. Vis quaeque ocurreret ea.cu bus  scripserit, modus voluptaria ex per.</p>
                            </div>
                            <div class="tab-content-item " id="add_infomation">
                                <table class="shop_attributes">
                                    <tbody>
                                        <tr>
                                            <th>Weight</th><td class="product_weight">1 kg</td>
                                        </tr>
                                        <tr>
                                            <th>Dimensions</th><td class="product_dimensions">12 x 15 x 23 cm</td>
                                        </tr>
                                        <tr>
                                            <th>Color</th><td><p>Black, Blue, Grey, Violet, Yellow</p></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-content-item " id="review">
                                
                                <div class="wrap-review-form">
                                    
                                    <div id="comments">
                                        <h2 class="woocommerce-Reviews-title">01 review for <span>Radiant-360 R6 Chainsaw Omnidirectional [Orage]</span></h2>
                                        <ol class="commentlist">
                                            <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                                                <div id="comment-20" class="comment_container"> 
                                                    <img alt="" src="{{url('public')}}/frontend//images/author-avata.jpg" height="80" width="80">
                                                    <div class="comment-text">
                                                        <div class="star-rating">
                                                            <span class="width-80-percent">Rated <strong class="rating">5</strong> out of 5</span>
                                                        </div>
                                                        <p class="meta"> 
                                                            <strong class="woocommerce-review__author">admin</strong> 
                                                            <span class="woocommerce-review__dash">–</span>
                                                            <time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >Tue, Aug 15,  2017</time>
                                                        </p>
                                                        <div class="description">
                                                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ol>
                                    </div><!-- #comments -->

                                    <div id="review_form_wrapper">
                                        <div id="review_form">
                                            <div id="respond" class="comment-respond"> 

                                                <form action="#" method="post" id="commentform" class="comment-form" novalidate="">
                                                    <p class="comment-notes">
                                                        <span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>
                                                    </p>
                                                    <div class="comment-form-rating">
                                                        <span>Your rating</span>
                                                        <p class="stars">
                                                            
                                                            <label for="rated-1"></label>
                                                            <input type="radio" id="rated-1" name="rating" value="1">
                                                            <label for="rated-2"></label>
                                                            <input type="radio" id="rated-2" name="rating" value="2">
                                                            <label for="rated-3"></label>
                                                            <input type="radio" id="rated-3" name="rating" value="3">
                                                            <label for="rated-4"></label>
                                                            <input type="radio" id="rated-4" name="rating" value="4">
                                                            <label for="rated-5"></label>
                                                            <input type="radio" id="rated-5" name="rating" value="5" checked="checked">
                                                        </p>
                                                    </div>
                                                    <p class="comment-form-author">
                                                        <label for="author">Name <span class="required">*</span></label> 
                                                        <input id="author" name="author" type="text" value="">
                                                    </p>
                                                    <p class="comment-form-email">
                                                        <label for="email">Email <span class="required">*</span></label> 
                                                        <input id="email" name="email" type="email" value="" >
                                                    </p>
                                                    <p class="comment-form-comment">
                                                        <label for="comment">Your review <span class="required">*</span>
                                                        </label>
                                                        <textarea id="comment" name="comment" cols="45" rows="8"></textarea>
                                                    </p>
                                                    <p class="form-submit">
                                                        <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                                                    </p>
                                                </form>

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

            <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wrap-show-advance-info-box style-1 box-in-site">
                    <h3 class="title-box">Related Products</h3>
                    <div class="wrap-products">
                        <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >
                            @foreach ($related_product as $pro)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{URL::to('/product/'.$pro->slug.'/'.$pro->id)}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img src="{{url('public/uploads/products')}}/{{ $pro->product_image }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label">Related</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="{{URL::to('/product/'.$pro->slug.'/'.$pro->id)}}" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{URL::to('/product/'.$pro->slug.'/'.$pro->id)}}" class="product-name"><span>{{$pro->name}}</span></a>
                                        @if ($pro->product_price_sale > 0){
                                            <div class="wrap-price"><ins><p class="product-price">{{ $pro->product_price_sale }}</p></ins> <del><p class="product-price">{{ $pro->product_price }}</p></del></div>
                                        }
                                        @else{
                                            <div class="wrap-price"><span class="product-price">{{ $pro->product_price}}</span></div>
                                        }
                                        @endif
                                        <a href="{{URL::to('/product/'.$pro->slug.'/'.$pro->id)}}" class="btn add-to-cart">Add To Cart</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div><!--End wrap-products-->
                </div>
            </div>

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