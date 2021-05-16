@extends('layout_home')
@section('content')

	<!--main area-->
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="{{route('home.index')}}" class="link">Trang chủ</a></li>
					<li class="item-link"><span>Thanh toán</span></li>
				</ul>
			</div>
			<div class=" main-content-area">
				<div class="wrap-address-billing">
					<h3 class="box-title">Địa chỉ thanh toán</h3>
					<form action="{{route('send_checkout')}}" method="POST" name="frm-billing">
						@csrf @method('POST')
						<p class="row-in-form">
							<label for="fname">Họ và tên:<span>*</span></label>
							<input id="fname" type="text" name="name" value="{{Auth::user()->name}}" placeholder="Họ và tên">
						</p>
						<p class="row-in-form">
							<label for="email">Email:</label>
							<input id="email" type="email" name="email" value="{{Auth::user()->email}}" placeholder="Email">
						</p>
						<p class="row-in-form">
							<label for="phone">Số điện thoại:<span>*</span></label>
							<input id="phone" type="number" name="user_phone" value="" required placeholder="Số điện thoại">
						</p>
						<p class="row-in-form">
							<label for="add">Địa chỉ nhận hàng:</label>
							<input id="add" type="text" name="user_address" value="" required placeholder="Địa chỉ nhận hàng">
						</p>
						<p class="row-in-form">
							<label for="country">Mô tả:<span>*</span></label>
							<input id="country" type="text" value="" name="user_message" required placeholder="Ghi chú">
						</p>	
						<div class="summary summary-checkout">
							<div class="summary-item payment-method">
								<h4 class="title-box">PHƯƠNG THỨC THANH TOÁN</h4>
								<p class="summary-info"><span class="title">Chọn phương thức thanh toán</span></p>
								<div class="choose-payment-methods">
									<label class="payment-method">
										<input name="payment-method" id="payment-method-bank" value="cash" type="radio" checked>
										<span>Thanh toán khi nhận hàng</span>
										<span class="payment-desc">Thanh toán sau khi bạn kiểm tra đơn hàng của mình</span>
									</label>
									<label class="payment-method">
										<input name="payment-method" id="payment-method-bank" value="bank" type="radio">
										<span>Thanh toán ngân hàng</span>
										<span class="payment-desc">Phương thức thanh toán nhanh,tiện lợi</span>
									</label>
									<label class="payment-method">
										<input name="payment-method" id="payment-method-visa" value="visa" type="radio">
										<span>visa</span>
										<span class="payment-desc">Phương thức thanh toán nhanh,tiện lợi</span>
									</label>
									<label class="payment-method">
										<input name="payment-method" id="payment-method-paypal" value="paypal" type="radio">
										<span>Paypal</span>
										<span class="payment-desc">Bạn có thể thanh toán bằng tín dụng của mình</span>
										<span class="payment-desc">thẻ nếu bạn không có tài khoản paypal</span>
									</label>
								</div>
								<p class="summary-info grand-total"><span>Tổng tiền</span> <span class="grand-total-price">{{number_format(Cart::total(0,'.',''))}}đ</span></p>								
								<input type="submit" class="btn btn-medium" value="Thanh toán">
							</div>
							<div class="summary-item shipping-method">
								<h4 class="title-box f-title">Phương thức giao hàng</h4>
								<p class="summary-info"><span class="title">Vận chuyển nhanh</span></p>
								<p class="summary-info"><span class="title">Miễn phí vận chuyển</span></p>
								<h4 class="title-box">Mã giảm giá:</h4>
								<p class="row-in-form">
									<label for="coupon-code">Nhập mã giảm giá:</label>
									<input id="coupon-code" type="text" name="coupon-code" value="" placeholder="">	
								</p>
								<a href="#" class="btn btn-small">Áp dụng</a>
							</div>
						</div>
											
					</form>
				</div>

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
						</div>
					</div><!--End wrap-products-->
				</div>

			</div><!--end main content area-->
		</div><!--end container-->

	</main>
	<!--main area-->
@stop