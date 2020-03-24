@extends('Customer.webLayout.mainShop')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Orders</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<form id="checkout-form" class="clearfix">
					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Order No :{{$order->order_no}} /
								<a href="{{ url('shop/'.$order->shops->id) }}" >{{$order->shops->en_name}}<a> 
								</h3>
							</div>
							<table class="shopping-cart-table table">
								<thead style="background-color:#82ae46">
									<tr>
										<th></th>
										<th style="color:#ffffff">Product</th>
										<th class="text-center" style="color:#ffffff">Price</th>
										<th class="text-center" style="color:#ffffff">Quantity</th>
										<th class="text-center" style="color:#ffffff">Total</th>
										<th class="text-right" style="color:#ffffff"></th>
									</tr>
								</thead>
								<tbody>
									
									
									
									@foreach($orderDetails as $details)
									<tr>
										<td class="thumb"><img src="{{ asset('uploads/homeShop/'.$details->product->main_image) }}" style="border-radius:1rem ;width:100px ;height:100px" alt=""></td>
										<td class="details">
											<a href="#">{{$details->product->en_name}}</a>
											
										</td>
										<td class="price text-center"><strong>{{$details->product->price}}</strong></td>
										<td class="qty text-center"><input class="input" type="number" value="{{$details->product_qty}}" disabled style="background-color:#F6F7F8"></td>
										<td class="total text-center"><strong class="primary-color">{{$details->product_cost}}</strong></td>
									</tr>
                                    @endforeach
								</tbody>
								<tfoot>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>SUBTOTAL</th>
										<th colspan="2" class="sub-total">{{$order->order_value}} EGP</th>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>SHIPING</th>
										<td colspan="2" class="sub-total">{{$order->shipping_value}} EGP</td>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>TOTAL</th>
										<th colspan="2" class="total">{{$order->net_value}} EGP</th>
									</tr>
								</tfoot>
							</table>
						</div>

					</div>
				</form>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- Last Seen section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">Last Seen</h3>
						<div class="pull-right">
							<div class="product-slick-dots-2 custom-dots">
							</div>
						</div>
					</div>
				</div>
				<!-- section title -->
				<!-- banner -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="banner banner-2">
						<img src="{{ asset('webasset/images/shop/w-banner.jpg')}}" alt="">
						<div class="banner-caption">
							<h2 class="white-color">ADS<br>Advertisement</h2>
							<button class="primary-btn">Shop Now</button>
						</div>
					</div>
				</div>
				<!-- /banner -->
				<!-- Product Slick -->
				<div class="col-md-9 col-sm-6 col-xs-6">
					<div class="row">
						<div id="product-slick-2" class="product-slick">
							
						@if($objAuth !=null)
							@foreach($clientٍSeen->products as $prod)
							
							<!-- Product Single -->
							<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
									@if($prod->new_flag >0 )
											<span>New</span>
											@endif
											@if($prod->discount_perc >0 )
											<span class="sale">-{{$prod->discount_perc}}%</span>
											@endif
									</div>
									<!-- <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button> -->
									<img src="{{ asset('uploads/homeShop/'.$prod->main_image) }}" alt="">								</div>
								<div class="product-body">
								@if($prod->discount_perc >0 )
								<h3 class="product-price">{{round($prod->price -($prod->discount_perc * $prod->price/ 100))}}
										<del class="product-old-price">{{$prod->price}}</del>	</h3>
										@else
										<h3 class="product-price">{{$prod->price}}</h3>
										@endif									
									@foreach(range(1,5) as $i)
										<div class="product-rating">
										@if($prod->total_stars_rate >=$i )
										<i class="fa fa-star"></i>
										@else
										<i class="fa fa-star-o empty"></i>
										@endif
									
									</div>
									@endforeach
									<h2 class="product-name"><a href="#">{{$prod->en_name}}</a></h2>
									<div class="product-btns">
									<form action="{{route('product')}}" method="get">
										<button class="main-btn quick-view" type="submit"><i class="fa fa-search-plus"></i> View More</button>

											<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
											<input type="hidden" name="productId"  value="{{$prod->id}}" />
										<!-- <li><a  class="main-btn quick-view" href="" ><i class="fa fa-search-plus"></i> View More</a></li> -->
										</form>										<button class="main-btn icon-btn"><i class="fas fa-share-alt"></i></button>
										<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
									</div>
								</div>
							</div>
							@endforeach
			    @endif
							<!-- /Product Single -->

						</div>
					</div>
				</div>
				<!-- /Product Slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->


@endsection
@section('scripts')
@endsection