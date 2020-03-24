@extends('Customer.webLayout.mainShop')
@section('content')
	<div id="home">
		<!-- container -->
		<div class="container"style="background-color:#30323A;">
			<div class="row">
				<div class="col-md-3"style="background-color:#82ae46;border:solid #82ae46 6px">
					<div style="background-color:white;padding:30px;">
				
						<img class="shop-logo" src="{{ asset('uploads/homeShop/'.$shopSlider->logo) }}" style="max-width:100%;border-radius:1rem;margin-bottom:15px;" />
						
						<h4>{{$shopSlider->slogan}}</h4>

						<h4 class="footer-header"style="padding-top:15px">{!! $shopSlider->description !!}</h4>
						<ul class="list-links">
							<li><a href="#">Our Products</a></li>
							<li><a href="#">About Company</a></li>
							<li><a href="#">Shiping Methods</a></li>
							<li><a href="#">Payments Methods</a></li>
							<li><a href="#">Contact US</a></li>
						</ul>

						<!-- footer social -->
						<ul class="footer-social"style="padding-top:15px">
							<li><a href="{{$shopSlider->facebook_url}}" class="work-ext-link" target="_blank" ><i class="fa fa-facebook"></i></a></li>
							<li><a href="{{$shopSlider->twitter_url}}" class="work-ext-link" target="_blank" ><i class="fa fa-twitter"></i></a></li>
							<li><a href="{{$shopSlider->instgram_url}}" class="work-ext-link" target="_blank" ><i class="fa fa-instagram"></i></a></li>
							<!-- <li><a href="#"><i class="fa fa-google-plus"></i></a></li> -->
						</ul>
					</div>
					<!-- /footer social -->
				</div>
					<!-- home wrap -->
					<div class="col-md-9">
						<!-- home slick -->
						<div id="home-slick">
							<!-- banner -->
							@foreach($data as $row)
							<div class="banner banner-1">
						
								<img src="{{ asset('uploads/homeShop/'.$row->image) }}" style="height:500px" alt="">
								<div class="banner-caption text-center">
									<h1>{{$row->main_text}}</h1>
									<h3 class="white-color font-weak">{{$row->sub_text}}</h3>
									<a href="" class="primary-btn">Shop Now</a>
								</div>
							
							</div>
							@endforeach
							
						</div>
						<!-- /home slick -->
					</div>
					<!-- /home wrap -->
				</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /HOME -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- banner -->
				<div class="col-md-3 col-sm-6">
					<a class="banner banner-1" href="#">
						<img class="pro-img" src="{{ asset('uploads/homeShop/'.$shopSlider->block1_image) }}" alt="">
						<div class="banner-caption text-center">
							<h2 class="white-color">{{$shopSlider->block1_text}}</h2>
						</div>
					</a>
				</div>
				<!-- /banner -->
				<!-- banner -->
				<div class="col-md-3 col-sm-6">
					<a class="banner banner-1" href="#">
						<img class="pro-img" src="{{ asset('uploads/homeShop/'.$shopSlider->block2_image) }}" alt="">
						<div class="banner-caption text-center">
							<h2 class="white-color">{{$shopSlider->block2_text}}</h2>
						</div>
					</a>
				</div>
				<!-- /banner -->
				<!-- banner -->
				<div class="col-md-3 col-sm-6">
					<a class="banner banner-1" href="#">
						<img class="pro-img" src="{{ asset('uploads/homeShop/'.$shopSlider->block3_image) }}" alt="">
						<div class="banner-caption text-center">
							<h2 class="white-color">{{$shopSlider->block3_text}}</h2>
						</div>
					</a>
				</div>
				<!-- /banner -->
				<!-- banner -->
				<div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-3">
					<a class="banner banner-1" href="#">
						<img class="pro-img" src="{{ asset('uploads/homeShop/'.$shopSlider->block4_image) }}" alt="">
						<div class="banner-caption text-center">
							<h2 class="white-color">{{$shopSlider->block4_text}}</h2>
						</div>
					</a>
				</div>
				<!-- /banner -->

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- All Products section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- ASIDE -->
				<div id="aside" class="col-md-3">

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">All Product</h3>

						<ul class="list-links">
							<li>
								<h3 class="list-links-title">Categories</h3>
							</li>
							@foreach($shop->categories as $cat)
							<li><a href="{{route('category', $cat->id)}}" >{{$cat->en_name}}</a></li>
							<input type="hidden" id="prodId" value="{{$cat->id}}">
							@endforeach
						</ul>

					</div>
					<!-- /aside widget -->
					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">FILTER BY Price :</h3>
						<div class="sidebar">
							<!--Price Range Filtering-->
							<div class="sidebar_section">
								<p><input type="text" id="amount" readonly style="border:0; color:#82ae46; font-weight:bold;font-size:17px"></p>
								<div id="slider-range"></div>
							</div>
						</div>
					</div>
					<!-- aside widget -->
					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Filter By Color:</h3>
						<ul class="color-option">
							<li><a href="#" style="background-color:#475984;"></a></li>
							<li><a href="#" style="background-color:#8A2454;"></a></li>
							<li class="active"><a href="#" style="background-color:#BF6989;"></a></li>
							<li><a href="#" style="background-color:#9A54D8;"></a></li>
							<li><a href="#" style="background-color:#675F52;"></a></li>
							<li><a href="#" style="background-color:#050505;"></a></li>
							<li><a href="#" style="background-color:#D5B47B;"></a></li>
							<li><a href="#" style="background-color:#8B4513;"></a></li>
							<li><a href="#" style="background-color:#800000;"></a></li>
						</ul>
						<ul class="color-option">
							<li><a href="#" style="background-color:#FFA07A;"></a></li>
							<li><a href="#" style="background-color:#E9967A;"></a></li>
							<li><a href="#" style="background-color:#DC143C;"></a></li>
							<li><a href="#" style="background-color:#FFD700;"></a></li>
							<li><a href="#" style="background-color:#FF8C00;"></a></li>
							<li><a href="#" style="background-color:#82ae46;"></a></li>
							<li><a href="#" style="background-color:#66CDAA;"></a></li>
							<li><a href="#" style="background-color:#008080;"></a></li>
							<li><a href="#" style="background-color:#C71585;"></a></li>
						</ul>
					</div>
					<!-- /aside widget -->
					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Filter By Size:</h3>
						<ul class="size-option">
							<li class="active"><a href="#">XS</a></li>
							<li class="active"><a href="#">SM</a></li>
							<li><a href="#">SL</a></li>
							<li><a href="#">XL</a></li>
							<li><a href="#">2X</a></li>
							<li><a href="#">3X</a></li>
						</ul>
						<br />
						<h5> More :</h5>
						<ul class="list-links  div-scroll">
							<li><input type="checkbox" class="input-checkbox" /> One Size</li>
							<li><input type="checkbox" class="input-checkbox" /> Free Size</li>
							<li><input type="checkbox" class="input-checkbox" /> UK 30</li>
							<li><input type="checkbox" class="input-checkbox" /> UK 32</li>
							<li><input type="checkbox" class="input-checkbox" /> UK 34</li>
							<li><input type="checkbox" class="input-checkbox" /> UK 36</li>
							<li><input type="checkbox" class="input-checkbox" /> EU 30</li>
							<li><input type="checkbox" class="input-checkbox" /> EU 32</li>
							<li><input type="checkbox" class="input-checkbox" /> EU 34</li>
							<li><input type="checkbox" class="input-checkbox" /> EU 36</li>
							<li><input type="checkbox" class="input-checkbox" /> XXXXL</li>
							<li><input type="checkbox" class="input-checkbox" /> XXXXXL</li>
							<li><input type="checkbox" class="input-checkbox" /> XXXXXXL</li>
						</ul>
					</div>
					<!-- /aside widget -->
					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Filter by Brand</h3>
						<ul class="list-links  div-scroll">
							<li><input type="checkbox" class="input-checkbox" /> Nike</li>
							<li><input type="checkbox" class="input-checkbox" /> Adidas</li>
							<li><input type="checkbox" class="input-checkbox" /> Polo</li>
							<li><input type="checkbox" class="input-checkbox" /> Lacost</li>
							<li><input type="checkbox" class="input-checkbox" /> Adidas</li>
							<li><input type="checkbox" class="input-checkbox" /> Polo</li>
							<li><input type="checkbox" class="input-checkbox" /> Lacost</li>
							<li><input type="checkbox" class="input-checkbox" /> Adidas</li>
							<li><input type="checkbox" class="input-checkbox" /> Polo</li>
							<li><input type="checkbox" class="input-checkbox" /> Lacost</li>
							<li><input type="checkbox" class="input-checkbox" /> Adidas</li>
							<li><input type="checkbox" class="input-checkbox" /> Polo</li>
							<li><input type="checkbox" class="input-checkbox" /> Lacost</li>
						</ul>
					</div>
					<!-- /aside widget -->
				</div>

				<!-- MAIN Product-->
				<div id="main" class="col-md-9">
			
					@yield('product')
					
					</div>
			
				</div>
				<!-- /MAIN Product-->
			</div>
		</div>
	</div>
	<!-- /section -->

	<!-- Last Order section -->
	<div class="section"style="background-color:#FFFAFA" >
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section-title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">Last Orders</h3>
						<div class="pull-right">
							<div class="product-slick-dots-1 custom-dots"></div>
						</div>
					</div>
				</div>
				<!-- /section-title -->
				<!-- banner -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="banner banner-2">
						<img src="{{ asset('webasset/images/shop/coll-banner.jpg')}}" alt="">
						<div class="banner-caption">
							<h2 class="white-color">NEW<br>COLLECTION</h2>
							<button class="primary-btn">Shop Now</button>
						</div>
					</div>
				</div>
				<!-- /banner -->
				<!-- Product Slick -->
				<div class="col-md-9 col-sm-6 col-xs-6">
					<div class="row">
						<div id="product-slick-1" class="product-slick">
							<!-- Product Single -->
							@foreach($ProdOrder as $prodOrder)
							@if($prodOrder->product->shop_id == $productShop)
							<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
									@if($prodOrder->product->new_flag >0 )
											<span>New</span>
											@endif
											@if($prodOrder->product->discount_perc >0 )
											<span class="sale">-{{$prodOrder->product->discount_perc}}%</span>
											@endif
										</div>
									
									<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
									<img src="{{ asset('uploads/homeShop/'.$prodOrder->product->main_image) }}" alt="">
								</div>
								<div class="product-body">
								@if($prodOrder->product->discount_perc >0 )
								<h3 class="product-price">{{round($prodOrder->product->price -($prodOrder->product->discount_perc * $prodOrder->product->price/ 100))}}
										<del class="product-old-price">{{$prodOrder->product->price}}</del>	</h3>
										@else
										<h3 class="product-price">{{$prodOrder->product->price}}</h3>
										@endif
										
										@foreach(range(1,5) as $i)
										<div class="product-rating">
										@if(($prodOrder->product->total_stars_rate) >=$i )
										<i class="fa fa-star"></i>
										@else
										<i class="fa fa-star-o empty"></i>
										@endif
											
										</div>
										@endforeach
									<h2 class="product-name"><a href="#">{{$prodOrder->product->en_name}}</a></h2>
									<div class="product-btns">
										<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
										<button class="main-btn icon-btn"><i class="fas fa-share-alt"></i></button>
										<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
									</div>
								</div>
							</div>
							@endif
							@endforeach
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
							<h2 class="white-color">NEW<br>COLLECTION</h2>
							<button class="primary-btn">Shop Now</button>
						</div>
					</div>
				</div>
				<!-- /banner -->
				<!-- Product Slick -->
				<div class="col-md-9 col-sm-6 col-xs-6">
					<div class="row">
						<div id="product-slick-2" class="product-slick">
							<!-- Product Single -->
							@foreach($client->products as $prod)
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
									<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
									<img src="{{ asset('uploads/homeShop/'.$prod->main_image) }}" alt="">
								</div>
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
										<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
										<button class="main-btn icon-btn"><i class="fas fa-share-alt"></i></button>
										<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
									</div>
								</div>
							</div>
							@endforeach
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

	<!-- Review section -->
	<div class="section"style="background-color:#FFFFF0">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
						<div class="section-title">
							<h4 class="title">Reviews</h4>
						</div>
				</div>
					<div class="col-md-6">
						<div id="product-reviews" class="product-reviews">
						@include('Customer.table_data')
						
						</div>
					</div>
					<div class="col-md-6">
						<h4 class="text-uppercase">Write Your Review</h4>
						<p>Your email address will not be published.</p>
						<form class="review-form" id="contact_us" method="post" action="javascript:void(0)">
                 
				  <input type="hidden" value="{{csrf_token()}}" id="token"/>
							<div class="form-group">
								<input class="input" type="text" id="name" name="name" placeholder="Your Name" require />
							</div>
							<div class="form-group">
								<input class="input" type="email" id="email" name="email" placeholder="Email Address"  />
							</div>
							<div class="form-group">
								<textarea class="input" placeholder="Your review" id="reviewss" name="review" require></textarea>
							</div>
							<div class="form-group">
								<div class="input-rating">
									<strong class="text-uppercase">Your Rating: </strong>
									<div class="stars">
										<input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
										<input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
										<input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
										<input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
										<input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
									</div>
								</div>
							</div>
							
							<button class="primary-btn" type="submit" >Submit</button>
						</form>
						<p id="res_message" style="dispaly:none"> Save</p>
					</div>
				</div>
		</div>
	</div>
	<!-- /Review section -->

	<!-- Offers section -->
	<div class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- banner -->
				<div class="col-md-8">
					<div class="banner banner-1">
						<img src="{{ asset('webasset/images/shop/offer-1.jpg')}}" alt="">
						<div class="banner-caption text-center">
							<h1 class="primary-color">HOT DEAL<br><span class="white-color font-weak">Up to 50% OFF</span></h1>
							<button class="primary-btn">Shop Now</button>
						</div>
					</div>
				</div>
				<!-- /banner -->
				<!-- banner -->
				<div class="col-md-4 col-sm-6">
					<a class="banner banner-1" href="#">
						<img src="{{ asset('webasset/images/shop/offer-2.jpg')}}" alt="">
						<div class="banner-caption text-center">
							<h2 class="white-color">NEW COLLECTION</h2>
						</div>
					</a>
				</div>
				<!-- /banner -->
				<!-- banner -->
				<div class="col-md-4 col-sm-6">
					<a class="banner banner-1" href="#">
						<img src="{{ asset('webasset/images/shop/offer-3.jpg')}}" alt="">
						<div class="banner-caption text-center">
							<h2 class="white-color">NEW COLLECTION</h2>
						</div>
					</a>
				</div>
				<!-- /banner -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->


	<!-- Company Details section -->
	<div class="section"style="background-color:#FFFFFF">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- <form id="checkout-form" class="clearfix"> -->
					<div class="col-md-6">
						<div class="shiping-methods">
							<div class="section-title">
								<h4 class="title">About Company</h4>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="about" id="about-1" checked>
								<label for="about-1">Shop Descrtption </label>
								<div class="caption">
									<p>{{$shopSlider->description}}
									<p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="about" id="about-2">
								<label for="about-2">Business Type </label>
								<div class="caption">
									<p>{{$shopSlider->business_type}}
									<p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="about" id="about-3">
								<label for="about-2">Total Annual Revenue</label>
								<div class="caption">
									<p>{{$shopSlider->total_revenue_annual}}
									<p>
								</div>
							</div>
						</div>

						<div class="shiping-methods">
							<div class="section-title">
								<h4 class="title">Shiping Methods</h4>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="shipping" id="shipping-1" checked>
								<label for="shipping-1">Free Shiping - 0.00 EGP</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
									<p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="shipping" id="shipping-2">
								<label for="shipping-2">Standard - 10.00 EGP</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
									<p>
								</div>
							</div>
						</div>

						<div class="payments-methods">
							<div class="section-title">
								<h4 class="title">Payments Methods</h4>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-1" checked>
								<label for="payments-1">Direct Bank Transfer</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
									<p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-2">
								<label for="payments-2">Cheque Payment</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
									<p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-3">
								<label for="payments-3">Paypal System</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
									<p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="billing-details">
							<div class="section-title">
								<h4 class="title">Contact US</h4>
							</div>
							<form id="checkout-form" class="clearfix" action="{{url('/addContact')}}" method="POST" >
							@csrf
							<label class="control-label">First Name :</label>
							<div class="form-group">
								<input type="text" class="form-control" name="fname" placeholder="Enter First Name *" require/>
							</div>
							<label class="control-label">Last Name :</label>
							<div class="form-group">
								<input type="text" class="form-control" name="lname" placeholder="Enter Last Name *" require />
							</div>
							<label class="control-label">Email :</label>
							<div class="form-group">
								<input type="text" class="form-control" name="email" placeholder="Enter Email *" require />
							</div>
							<label class="control-label">Country :</label>
							<div class="form-group">
								<input type="text" class="form-control" name="country" placeholder="Enter Country *" require />
							</div>
							<label class="control-label">Phone :</label>
							<div class="form-group">
								<input type="text" class="form-control" name="phone" placeholder="Enter Phone *"   />
							</div>
							<label class="control-label">Message :</label>
							<div class="form-group">
								<textarea class="form-control"name="msg" rows="5" require ></textarea>
							</div>
							<button class="col-md-12 primary-btn" type="submit">Submit</button>
							</form>
						</div>
					</div>
					
				<!-- </form> -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	@endsection
@section('scripts')
<!-- <script>

$(document).ready(function(){

});

</script>
<script>
$(document).ready(function(){

 $(document).on('click', '#productMain .pagination a', function(event){
  event.preventDefault(); 
  var page = $(this).attr('href').split('page=')[1];
  alert("id bk is >"+page);
  fetch_data(page);
 });

 function fetch_data(page)
 {
  $.ajax({
	
    url:"shop/fetch_product?page="+page,
   success:function(data)
   {
        // alert(data);
     $('#main').html(data);
    // location.reload();
   }
   
  });
 }
 
});

</script>
<script>

$(document).ready(function(){

 $(document).on('click', '#product .pagination a', function(event){
  event.preventDefault(); 
  var page = $(this).attr('href').split('page=')[1];
  alert("id is >"+page);
  var id=$('#prodId').val();
  fetch_data(page);
  
 });

 function fetch_data(page)
 {
  $.ajax({
	type:'GET',
    url:"shop/fetch_productWhere?page="+page"&"+id,
    data:{
            id: $('#prodId').val()
        },
   success:function(data)
   {
     alert("id is >"+id);
    $('#main').html(data);
   }
  });
 }
 
});

/*refrsh category*/
function refreshCat(id){
	// alert("here>>"+id);
	$.ajax({
	type:'GET',
	url:"shop/getCatList",
	data: { id: id },
   success:function(data)
   {
    // location.reload();   
	
	 $('#main').html(data);
	
   }
  });
  
}
</script> -->
<script>
$(document).ready(function() {
$("#res_message").hide();

$('#contact_us').on('submit', function(e){
    event.preventDefault();
	
    var token = $("#token").val();
    $.ajax({
        url: "addReview",
        type: 'post',
    		data:
		{
			_token:token,
			name:$("#name").val(),
			email:$("#email").val(),
			review:$("#reviewss").val(),
			rating:$("input[name='rating']:checked").val(),	
		} ,
        success: function(response){
			$('#res_message').show();
			location.reload();
	
        },
        error: function(response){
          
		alert('you must put rate');
        }
    });
});

// paginate
$(document).on('click', '#review .pagination a', function(event){
  event.preventDefault(); 
  var page = $(this).attr('href').split('page=')[1];
  fetch_data(page);
 });

 function fetch_data(page)
 {
  $.ajax({
	
    url:"shop/fetch_data?page="+page,
   success:function(data)
   {
    $('#product-reviews').html(data);
   }
  });
 }
 

});
</script>  
 @endsection