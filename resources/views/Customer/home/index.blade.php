@extends('Customer.webLayout.mainShop')
@section('content')

	<!-- Start Slider section -->
	<div id="wowslider-container1"style="z-index:1 !important;">

		<div class="ws_images">
			<ul>
				<li><a href="www.google.com" target="_blank"><img src="{{ asset('webasset/data1/images/architectureblurbuildingbusiness449559.jpg')}}" alt="Zaraa - Cairo Mall - Floor 1 - D 3" title="Zaraa - Cairo Mall - Floor 1 - D 3" id="wows1_0" /></a></li>
				<li><a href="www.google.com" target="_blank"><img src="{{ asset('webasset/data1/images/crowngroupmodernmotion374894.jpg')}}" alt="H & M - Cairo Mall - Floor 3 - A 5" title="H & M - Cairo Mall - Floor 3 - A 5" id="wows1_1" /></a></li>
				<li><a href="www.google.com" target="_blank"><img src="{{ asset('webasset/data1/images/peopleinsidebuilding2610756.jpg')}}" alt="Brand - Cairo Mall - Floor 3 - B 7" title="Brand - Cairo Mall - Floor 3 - B 7" id="wows1_2" /></a></li>
				<li><a href="www.google.com" target="_blank"><img src="{{ asset('webasset/data1/images/peoplewalkinginsidebuilding2861656.jpg')}}" alt="Takber - Cairo Mall - Floor 1 - E 8" title="Takber - Cairo Mall - Floor 1 - E 8" id="wows1_3" /></a></li>
				<li><a href="www.google.com" target="_blank"><img src="{{ asset('webasset/data1/images/photoofshoppingmall2861655.jpg')}}" alt="Kataket - Cairo Mall - Floor 3 - A 4" title="Kataket - Cairo Mall - Floor 3 - A 4" id="wows1_4" /></a></li>
			</ul>
		</div>
		<div class="ws_bullets">
			<div>
				<a href="#" title="Zaraa - Cairo Mall - Floor 1 - D 3"><span><img src="{{ asset('webasset/data1/tooltips/architectureblurbuildingbusiness449559.jpg')}}" alt="Zaraa - Cairo Mall - Floor 1 - D 3" />1</span></a>
				<a href="#" title="H & M - Cairo Mall - Floor 3 - A 5"><span><img src="{{ asset('webasset/data1/tooltips/crowngroupmodernmotion374894.jpg')}}" alt="H & M - Cairo Mall - Floor 3 - A 5" />2</span></a>
				<a href="#" title="Brand - Cairo Mall - Floor 3 - B 7"><span><img src="{{ asset('webasset/data1/tooltips/peopleinsidebuilding2610756.jpg')}}" alt="Brand - Cairo Mall - Floor 3 - B 7" />3</span></a>
				<a href="#" title="Takber - Cairo Mall - Floor 1 - E 8"><span><img src="{{ asset('webasset/data1/tooltips/peoplewalkinginsidebuilding2861656.jpg')}}" alt="Takber - Cairo Mall - Floor 1 - E 8" />4</span></a>
				<a href="#" title="Kataket - Cairo Mall - Floor 3 - A 4"><span><img src="{{ asset('webasset/data1/tooltips/photoofshoppingmall2861655.jpg')}}" alt="Kataket - Cairo Mall - Floor 3 - A 4" />5</span></a>
			</div>
		</div>
		<div class="ws_shadow"></div>
		<!-- Start V Menu section -->
		<div class="cat-menu" style="z-index:10 !important">
			<ul class="menu" style="z-index:10 !important">
				<li class="catg">
					<a href="#"><i class="fas fa-store-alt"></i> Start</a>
					<div class="megadrop">
						<div class="col">
							<h3>Title</h3>
							<ul>
								<li>
									<a href="#">Sub-menu 1</a>
								</li>
								<li>
									<a href="#">Sub-menu 2</a>
								</li>
								<li>
									<a href="#">Sub-menu 3</a>
								</li>
								<li>
									<a href="#">Sub-menu 4</a>
								</li>
								<li>
									<a href="#">Sub-menu 5</a>
								</li>
								<li>
									<a href="#">Sub-menu 6</a>
								</li>
								<li>
									<a href="#">Sub-menu 7</a>
								</li>
							</ul>
						</div>
						<div class="col">
							<h3>Title</h3>
							<ul>
								<li>
									<a href="#">Sub-menu 1</a>
								</li>
								<li>
									<a href="#">Sub-menu 2</a>
								</li>
								<li>
									<a href="#">Sub-menu 3</a>
								</li>
								<li>
									<a href="#">Sub-menu 4</a>
								</li>
								<li>
									<a href="#">Sub-menu 5</a>
								</li>
								<li>
									<a href="#">Sub-menu 6</a>
								</li>
								<li>
									<a href="#">Sub-menu 7</a>
								</li>
							</ul>
						</div>
						<div class="col">
							<h3>Title</h3>
							<ul>
								<li>
									<a href="#">Sub-menu 1</a>
								</li>
								<li>
									<a href="#">Sub-menu 2</a>
								</li>
								<li>
									<a href="#">Sub-menu 3</a>
								</li>
								<li>
									<a href="#">Sub-menu 4</a>
								</li>
								<li>
									<a href="#">Sub-menu 5</a>
								</li>
								<li>
									<a href="#">Sub-menu 6</a>
								</li>
								<li>
									<a href="#">Sub-menu 7</a>
								</li>
							</ul>
						</div>
					</div>
				</li>
				<li class="catg">
			
					<a  href="{{ url('category/'.$men->id) }}" ><i class="fas fa-tshirt"></i> 
					@if(app()->getLocale()=='en')
					{{$men->en_name}}
					@else
					{{$men->ar_name}}
					@endif
				</a>

					<div class="megadrop">
						<div class="col">
							<h3></h3>
							<ul>
								<li>
									<a href="#">Classic</a>
								</li>
								<li>
									<a href="{{ url('category/'.$tShirt->id) }}" >
									@if(app()->getLocale()=='en')
									{{$tShirt->en_name}}</a>
									@else
									{{$tShirt->ar_name}}
									@endif
								</li>
								<li>
									<a href="#">Trousers</a>
								</li>
								<li>
									<a href="#">Suits</a>
								</li>
								<li>
									<a href="{{ url('category/'.$short->id) }}" >
									@if(app()->getLocale()=='en')
									{{$short->en_name}}
									@else
									{{$short->ar_name}}
									@endif</a>
								</li>
								<li>
									<a href="#">Jackets</a>
								</li>
								<li>
									<a href="#">Home Wear</a>
								</li>
							</ul>
						</div>
						<div class="col">
							<h3></h3>
							<ul>
								<li>
									<a href="#">Men Shoes</a>
								</li>
								<li>
									<a href="#">Swim Clothes</a>
								</li>
								<li>
									<a href="#">Sports Wear</a>
								</li>
								<li>
									<a href="#">Jeans</a>
								</li>
								<li>
									<a href="#">Under Wear</a>
								</li>
								<li>
									<a href="#">Sweaters</a>
								</li>
								<li>
									<a href="#">Sleep & Lounge</a>
								</li>
							</ul>
						</div>
						<div class="col">
							<h3></h3>
							<ul>
								<li>
									<a href="#">Accessories</a>
								</li>
								<li>
									<a href="#">Watches</a>
								</li>
								<li>
									<a href="#">Men Socks</a>
								</li>
								<li>
									<a href="#">Sub-menu 4</a>
								</li>
								<li>
									<a href="#">Sub-menu 5</a>
								</li>
								<li>
									<a href="#">Sub-menu 6</a>
								</li>
								<li>
									<a href="#">Sub-menu 7</a>
								</li>
							</ul>
						</div>
					</div>

				</li>
				<li class="catg">
					<a href="#"><i class="fas fa-socks"></i> Women</a>

					<div class="megadrop">
						<div class="col">
							<h3>Title</h3>
							<ul>
								<li>
									<a href="#">Sub-menu 1</a>
								</li>
								<li>
									<a href="#">Sub-menu 2</a>
								</li>
								<li>
									<a href="#">Sub-menu 3</a>
								</li>
								<li>
									<a href="#">Sub-menu 4</a>
								</li>
								<li>
									<a href="#">Sub-menu 5</a>
								</li>
								<li>
									<a href="#">Sub-menu 6</a>
								</li>
								<li>
									<a href="#">Sub-menu 7</a>
								</li>
							</ul>
						</div>
						<div class="col">
							<h3>Title</h3>
							<ul>
								<li>
									<a href="#">Sub-menu 1</a>
								</li>
								<li>
									<a href="#">Sub-menu 2</a>
								</li>
								<li>
									<a href="#">Sub-menu 3</a>
								</li>
								<li>
									<a href="#">Sub-menu 4</a>
								</li>
								<li>
									<a href="#">Sub-menu 5</a>
								</li>
								<li>
									<a href="#">Sub-menu 6</a>
								</li>
								<li>
									<a href="#">Sub-menu 7</a>
								</li>
							</ul>
						</div>
						<div class="col">
							<h3>Title</h3>
							<ul>
								<li>
									<a href="#">Sub-menu 1</a>
								</li>
								<li>
									<a href="#">Sub-menu 2</a>
								</li>
								<li>
									<a href="#">Sub-menu 3</a>
								</li>
								<li>
									<a href="#">Sub-menu 4</a>
								</li>
								<li>
									<a href="#">Sub-menu 5</a>
								</li>
								<li>
									<a href="#">Sub-menu 6</a>
								</li>
								<li>
									<a href="#">Sub-menu 7</a>
								</li>
							</ul>
						</div>
					</div>

				</li>
				<li class="catg">
					<a href="#"><i class="fas fa-gift" style="font-size:15px"></i> Childern</a>

					<div class="megadrop">
						<div class="col">
							<h3>Title</h3>
							<ul>
								<li>
									<a href="#">Sub-menu 1</a>
								</li>
								<li>
									<a href="#">Sub-menu 2</a>
								</li>
								<li>
									<a href="#">Sub-menu 3</a>
								</li>
								<li>
									<a href="#">Sub-menu 4</a>
								</li>
								<li>
									<a href="#">Sub-menu 5</a>
								</li>
								<li>
									<a href="#">Sub-menu 6</a>
								</li>
								<li>
									<a href="#">Sub-menu 7</a>
								</li>
							</ul>
						</div>
						<div class="col">
							<h3>Title</h3>
							<ul>
								<li>
									<a href="#">Sub-menu 1</a>
								</li>
								<li>
									<a href="#">Sub-menu 2</a>
								</li>
								<li>
									<a href="#">Sub-menu 3</a>
								</li>
								<li>
									<a href="#">Sub-menu 4</a>
								</li>
								<li>
									<a href="#">Sub-menu 5</a>
								</li>
								<li>
									<a href="#">Sub-menu 6</a>
								</li>
								<li>
									<a href="#">Sub-menu 7</a>
								</li>
							</ul>
						</div>
						<div class="col">
							<h3>Title</h3>
							<ul>
								<li>
									<a href="#">Sub-menu 1</a>
								</li>
								<li>
									<a href="#">Sub-menu 2</a>
								</li>
								<li>
									<a href="#">Sub-menu 3</a>
								</li>
								<li>
									<a href="#">Sub-menu 4</a>
								</li>
								<li>
									<a href="#">Sub-menu 5</a>
								</li>
								<li>
									<a href="#">Sub-menu 6</a>
								</li>
								<li>
									<a href="#">Sub-menu 7</a>
								</li>
							</ul>
						</div>
					</div>

				</li>
			</ul>
		</div>
<div class="popover__wrapper">
			<a href="#">
				<h2 class="popover__title">...</h2>
			</a>
			<div class="arrow" style="z-index:22 !important">
				<a href="#">
					<span></span>
					<span></span>
					<span></span>
				</a>
			</div>
			<div class="popover__content">
				<h5 class="popover__message">ِADS ... SHOP NOW</h5>
				<img alt="" src="https://media.giphy.com/media/MEgGD8bV72hfq/giphy.gif">
			</div>
		</div>
		<!-- End Arrow + Ads section -->
	</div>
	<!-- End Slider section -->

	<!-- Ads section -->
	<div class="section" style="background-color:#FFFAFA">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section-title -->
				<!--<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">Last Orders</h3>
						<div class="pull-right">
							<div class="product-slick-dots-1 custom-dots"></div>
						</div>
					</div>
				</div>-->
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
							<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
										<span>ADS</span>
									</div>
									<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick View</button>
									<img src="{{ asset('webasset/images/item2.jpg')}}" alt="">
								</div>
							</div>
							<!-- /Product Single -->
							<!-- Product Single -->
							<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
										<span>ADS</span>
									</div>
									<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick View</button>
									<img src="{{ asset('webasset/images/item3.jpg')}}" alt="">
								</div>
							</div>
							<!-- /Product Single -->
							<!-- Product Single -->
							<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
										<span>ADS</span>
									</div>
									<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick View</button>
									<img src="{{ asset('webasset/images/item4.jpg')}}" alt="">
								</div>
							</div>
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

	<!-- Start Gallary section -->
	<section class="ftco-section" style="background-color:#F8F8FF">
		<div class="container">
			<div class="row justify-content-center mb-3 pb-3">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<span class="subheading">Mall Shops</span>
					<h2 class="mb-4">Visit US Now</h2>
					<p>Lorem Ipsum has been the industry's standard dummy text ever since</p>
				</div>
			</div>
		</div>
		<div id="Gallery-area" class="our_feature_area">
			<div class="container">
				<div id="demo-default" class="demo s_black_title" style="padding-top:0px">
					<div id="coverflow">
						<ul class="flip-items">
						@if($shops !=null)
                        @foreach($shops as $shop)
							<li data-flip-title="Red">
								<a href="{{ url('shop/'.$shop->id) }}"><img src="{{ asset('uploads/homeShop/'.$shop->main_img) }}" style="width:350px ; height:350px"></a>
							</li>
						@endforeach
						@endif
							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Gallary section -->

	<!--Start New Arrival-->
	<div class="section">
		<div class="container">
			<div class="row justify-content-center mb-3 pb-3">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<span class="subheading">Products</span>
					<h2 class="mb-4">New Arrival</h2>
					<p>Lorem Ipsum has been the industry's standard dummy text ever since</p>
				</div>
			</div>
		</div>
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="addCart alert alert-success" id="addCart"  role="alert" style="display:none;" >The Product has been added to Your Cart</div>
              <div class="delCart alert alert-danger" id="delCart" role="alert" style="display:none;" >The Product Not add in your cart</div>
			<div class="row">
			
				<!-- Product Single -->
                @foreach($newrProducts as $newrProduct)
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<!-- <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> View More</button> -->
							<img src="{{ asset('uploads/homeShop/'.$newrProduct->main_image) }}" class="img-prod" />
						</div>
						<div class="product-body">

							<h3 class="product-price">{{ $newrProduct->price}}</h3>
							<div class="product-rating">
								<h2 class="product-name"><a href="#">{{ $newrProduct->en_name}}</a></h2>
							</div>
							<div class="product-btns">
                            <form action="{{route('product')}}" method="get">
										<button class="main-btn quick-view" type="submit"><i class="fa fa-search-plus"></i> View More</button>

											<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
											<input type="hidden" name="productId" id="productId" value="{{$newrProduct->id}}" />
										</form>
								<button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
								@if($objAuth!=null)
								<button  onClick='addProductCart({{$newrProduct->id}})' id="addProductCart" class="main-btn icon-btn"><i class="fa fa-shopping-cart"></i></button>
								@else
								<button class="primary-btn add-to-cart" onclick="return alert('You Must Login First');" ><i class="fa fa-shopping-cart"></i></button>
								@endif	
							</div>
						</div>
					</div>
				</div>
                @endforeach
				<!-- /Product Single -->
		
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!--End New Arrival-->

	<!-- Start Deal of the day Section -->
	<section class="ftco-section img" style="background-image: url({{ asset('webasset/images/bg_3.jpg')}});">
		<div class="container">
			<div class="row justify-content-end">
				<div class="col-lg-6"></div>
				<div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
					<span class="subheading">Best Price For You</span>
					<h2 class="mb-4">Deal of the day</h2>
					<p>Lorem Ipsum has been the industry's standard dummy text ever since</p>
					<h3><a href="#">Buy Now 50% OFF</a></h3>
					
				</div>
				<div class="col-lg-6"></div>
				<div class="count">
					<ul id="countdown">
						<li id="days">
							<div class="number">00</div>
							<div class="label">Days</div>
						</li>
						<li id="hours">
							<div class="number">00</div>
							<div class="label">Hours</div>
						</li>
						<li id="minutes">
							<div class="number">00</div>
							<div class="label">Minutes</div>
						</li>
						<li id="seconds">
							<div class="number">00</div>
							<div class="label">Seconds</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!-- End Deal of the day Section -->

	<!--Start Best Offers PRODUCTS-->
	<div class="section">
		<div class="container">
			<div class="row justify-content-center mb-3 pb-3">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<span class="subheading">Products</span>
					<h2 class="mb-4">Best Offers</h2>
					<p>Lorem Ipsum has been the industry's standard dummy text ever since</p>
				</div>
			</div>
		</div>
		<!-- container -->
		<div class="container">
			<!-- row -->
			<!-- row -->
			<div class="addCart alert alert-success" id="addCart"  role="alert" style="display:none;" >The Product has been added to Your Cart</div>
              <div class="delCart alert alert-danger" id="delCart" role="alert" style="display:none;" >The Product Not add in your cart</div>
		
			<div class="row">
			@foreach($offersProducts  as $offersProduct )
				<!-- Product Single -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<div class="product-label">
                            @if($offersProduct->new_flag >0 )
											<span>New</span>
											@endif
											@if($offersProduct->discount_perc >0 )
											<span class="sale">-{{$offersProduct->discount_perc}}%</span>
											@endif
							</div>
							<!-- <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> View More</button> -->
							<img src="{{ asset('uploads/homeShop/'.$offersProduct->main_image) }}" style="border-radius:1rem" />
						</div>
						<div class="product-body">

							<h3 class="product-price">
                            {{round($offersProduct->price -($offersProduct->discount_perc * $offersProduct->price/ 100))}}                            </h3>
							<div class="product-rating">
								<h2 class="product-name"><a href="#">{{ $offersProduct->en_name}}</a></h2>
							</div>
							<div class="product-btns">
                            <form action="{{route('product')}}" method="get">
										<button class="main-btn quick-view" type="submit"><i class="fa fa-search-plus"></i> View More</button>

											<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
											<input type="hidden" name="productId" id="productId" value="{{$offersProduct->id}}" />
										<!-- <li><a  class="main-btn quick-view" href="" ><i class="fa fa-search-plus"></i> View More</a></li> -->
										</form>
								<button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
								@if($objAuth!=null)
								<button  onClick='addProductCart({{$newrProduct->id}})' id="addProductCart" class="main-btn icon-btn"><i class="fa fa-shopping-cart"></i></button>
								@else
								<button class="primary-btn add-to-cart" onclick="return alert('You Must Login First');" ><i class="fa fa-shopping-cart"></i></button>
								@endif	
															</div>
						</div>
					</div>
				</div>
				<!-- /Product Single -->
                @endforeach
	
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!--End RELATED PRODUCTS-->
	<!-- Ads section -->
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
							<h1 class="primary-color">ADS<br><span class="white-color font-weak">Advertisement</span></h1>
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
							<h2 class="white-color">Advertisement</h2>
						</div>
					</a>
					<a class="banner banner-1" href="#">
						<img src="{{ asset('webasset/images/shop/offer-3.jpg')}}" alt="">
						<div class="banner-caption text-center">
							<h2 class="white-color">Advertisement</h2>
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
	<!-- Start Coming Soon Product -->
	<div class="section">
		<div class="container">
			<div class="row justify-content-center mb-3 pb-3">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<span class="subheading">New Products</span>
					<h2 class="mb-4">Coming Soon</h2>
					<p>Lorem Ipsum has been the industry's standard dummy text ever since</p>
				</div>
			</div>
		</div>
		<!-- container -->
		<div class="container">
		<div class="addCart alert alert-success" id="addCart"  role="alert" style="display:none;" >The Product has been added to Your Cart</div>
              <div class="delCart alert alert-danger" id="delCart" role="alert" style="display:none;" >The Product Not add in your cart</div>
		
			<!-- row -->
			<div class="row">
			@foreach($commingProducts as $commingProduct)
				<!-- Product Single -->
				<div class="col-md-6 col-sm-6 col-xs-6">
					<div class="row">
						<div class="product product-single">
							<div class="col-md-6 product-thumb">
								<div class="product-label">
								</div>
								<img src="{{ asset('uploads/homeShop/'.$commingProduct->main_image) }}" style="border-radius:1rem;max-height:280px" />
							</div>
							<div class="col-md-6 product-body">
								<div style="color:#82ae46"><h6 class="product-price">Soon -</h6><h6 class="product-price" style="margin:0px 5px"> Available</h6></div>
								<div><h3 class="product-price">{{$commingProduct->price}}</h3></div>
								<div><h2 class="product-name" style="display:inline-block"><a href="#">{{$commingProduct->en_name}}</a></h2></div>
								
								<p style="display:inline-block">
                                {!! \Illuminate\Support\Str::limit($commingProduct->en_description, 150, $end='...........') !!}
                                </p>
								<div class="" style="display:inline-block">
								<form action="{{route('product')}}" method="get">
										<button class="main-btn quick-view" type="submit"><i class="fa fa-search-plus"></i> View More</button>

											<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
											<input type="hidden" name="productId" id="productId" value="{{$commingProduct->id}}" />
										<!-- <li><a  class="main-btn quick-view" href="" ><i class="fa fa-search-plus"></i> View More</a></li> -->
										</form>
									<button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
									@if($objAuth!=null)
								<button  onClick='addProductCart({{$newrProduct->id}})' id="addProductCart" class="main-btn icon-btn"><i class="fa fa-shopping-cart"></i></button>
								@else
								<button class="primary-btn add-to-cart" onclick="return alert('You Must Login First');" ><i class="fa fa-shopping-cart"></i> </button>
								@endif	
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Product Single -->
                @endforeach
			
				<!-- btn Show more -->
				<div class="col-md-12" style="margin-top:40px">
					<button class="primary-btn add-to-cart">Show More</button>
				</div>
				<!-- /btn Show more -->
			</div>
		</div>
	</div>
	<!-- End Coming Soon Product -->

	<!-- Start Reviews Section -->
	<section class="ftco-section testimony-section" style="padding-top:0px">
		<div class="container">
			<div class="row justify-content-center mb-3 pb-3">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<span class="subheading">Reviews</span>
					<h2 class="mb-4">Our satisfied customer says</h2>
					<p>Lorem Ipsum has been the industry's standard dummy text ever since</p>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row ftco-animate">
				<div class="col-md-12">
					<div class="carousel-testimony owl-carousel">
                    @foreach($reviews as $review)
						<div class="item">
							<div class="testimony-wrap p-4 pb-5">
								<div class="user-img mb-5" style="background-image: url({{ asset('webasset/images/bg3.jpg')}})">
									<span class="quote d-flex align-items-center justify-content-center">
										<i class="fas fa-quote-left"></i>
									</span>
								</div>
								<div class="text text-center">
									<p class="mb-5 pl-4 line">
                                    {{ \Illuminate\Support\Str::limit($review->review_text, 150, $end='...........') }}
									<p class="name">
                                    {{$review->name}}
                                    </p>
									
								</div>
							</div>
						</div>
                        @endforeach
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Reviews Section -->

	<!-- Start Contact Section -->
	<section class="ftco-section contact-section bg-light" style="background: #F6F7F8;padding-bottom:30px">
		<div class="container">
			<div class="row justify-content-center mb-3 pb-3">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<span class="subheading">Contact Us</span>
					<span class="subheading">We would love to hear from you!</span>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row block-9">
				<div class="col-md-6 order-md-last d-flex">
					<form action="#" class="bg-white p-5 contact-form">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Your Name">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Your Email">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Subject">
						</div>
						<div class="form-group">
							<textarea name="" id="" cols="30" rows="4" class="form-control" placeholder="Message"></textarea>
						</div>
						<div class="form-group">
							<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Send Message</button>
						</div>
					</form>

				</div>
				<div class="col-md-6 d-flex">
					<div id="map" class="bg-white">
						<div class="mapouter">
							<div class="gmap_canvas" style="width:100%"><iframe style="width:100%;height:100%" id="gmap_canvas" src="https://maps.google.com/maps?q=senior%20consulting&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.crocothemes.net"></a></div>
							<style>
								.mapouter {
									position: relative;
									text-align: right;
								}

								.gmap_canvas {
									overflow: hidden;
									background: none !important;
									height: 300px;
								}
							</style>
						</div>
					</div>
				</div>
			</div>
			<hr>
		</div>
	</section>
	<!-- End Contact Section -->
@endsection
@section('scripts')
<script>
		/* --------------------------
 * GLOBAL VARS
 * -------------------------- */
		// The date you want to count down to
		var targetDate = new Date("2019/12/25 00:00:00");

		// Other date related variables
		var days;
		var hrs;
		var min;
		var sec;

		/* --------------------------
		 * ON DOCUMENT LOAD
		 * -------------------------- */
		$(function () {
			// Calculate time until launch date
			timeToLaunch();
			// Transition the current countdown from 0 
			numberTransition('#days .number', days, 1000, 'easeOutQuad');
			numberTransition('#hours .number', hrs, 1000, 'easeOutQuad');
			numberTransition('#minutes .number', min, 1000, 'easeOutQuad');
			numberTransition('#seconds .number', sec, 1000, 'easeOutQuad');
			// Begin Countdown
			setTimeout(countDownTimer, 1001);
		});

		/* --------------------------
		 * FIGURE OUT THE AMOUNT OF 
		   TIME LEFT BEFORE LAUNCH
		 * -------------------------- */
		function timeToLaunch() {
			// Get the current date
			var currentDate = new Date();

			// Find the difference between dates
			var diff = (currentDate - targetDate) / 1000;
			var diff = Math.abs(Math.floor(diff));

			// Check number of days until target
			days = Math.floor(diff / (24 * 60 * 60));
			sec = diff - days * 24 * 60 * 60;

			// Check number of hours until target
			hrs = Math.floor(sec / (60 * 60));
			sec = sec - hrs * 60 * 60;

			// Check number of minutes until target
			min = Math.floor(sec / (60));
			sec = sec - min * 60;
		}

		/* --------------------------
		 * DISPLAY THE CURRENT 
		   COUNT TO LAUNCH
		 * -------------------------- */
		function countDownTimer() {

			// Figure out the time to launch
			timeToLaunch();

			// Write to countdown component
			$("#days .number").text(days);
			$("#hours .number").text(hrs);
			$("#minutes .number").text(min);
			$("#seconds .number").text(sec);

			// Repeat the check every second
			setTimeout(countDownTimer, 1000);
		}

		/* --------------------------
		 * TRANSITION NUMBERS FROM 0
		   TO CURRENT TIME UNTIL LAUNCH
		 * -------------------------- */
		function numberTransition(id, endPoint, transitionDuration, transitionEase) {
			// Transition numbers from 0 to the final number
			$({ numberCount: $(id).text() }).animate({ numberCount: endPoint }, {
				duration: transitionDuration,
				easing: transitionEase,
				step: function () {
					$(id).text(Math.floor(this.numberCount));
				},
				complete: function () {
					$(id).text(this.numberCount);
				}
			});
		};
	</script>




@endsection