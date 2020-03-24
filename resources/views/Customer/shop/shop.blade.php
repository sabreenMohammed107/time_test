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

						<h4 class="footer-header"style="padding-top:15px">{!! $shopSlider->en_name !!}</h4>
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
<div id="testingAllProduct">
    @include('Customer.shop.allProduct')
</div>
	<!-- /section -->

	<!-- Last Order section -->
	<div class="section"style="background-color:#FFFAFA" >
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="addCart alert alert-success" id="addCart"  role="alert" style="display:none;" >The Product has been added to Your Cart</div>
              <div class="delCart alert alert-danger" id="delCart" role="alert" style="display:none;" >The Product Not add in your cart</div>
		
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
									
									<!-- <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button> -->
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
									<!-- last orders favourite -->
									<form action="{{route('product')}}" method="get">
										<button class="main-btn quick-view" type="submit"><i class="fa fa-search-plus"></i> View More</button>

											<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
											<input type="hidden" name="productId" value="{{$prodOrder->product->id}}" />
										<!-- <li><a  class="main-btn quick-view" href="" ><i class="fa fa-search-plus"></i> View More</a></li> -->
										</form>

										<button class="main-btn icon-btn"><i class="fas fa-share-alt"></i></button>
										@if($objAuth!=null)
								<button  onClick='addProductCart({{$prodOrder->id}})' id="addProductCart" class="main-btn icon-btn"><i class="fa fa-shopping-cart"></i></button>
								@else
								<button class="primary-btn add-to-cart" onclick="return alert('You Must Login First');" ><i class="fa fa-shopping-cart"></i> </button>
								@endif			
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
		<div class="addCart alert alert-success" id="addCart"  role="alert" style="display:none;" >The Product has been added to Your Cart</div>
              <div class="delCart alert alert-danger" id="delCart" role="alert" style="display:none;" >The Product Not add in your cart</div>
		
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
							@if($objAuth !=null)
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
									<!-- <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button> -->
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
									<form action="{{route('product')}}" method="get">
										<button class="main-btn quick-view" type="submit"><i class="fa fa-search-plus"></i> View More</button>

											<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
											<input type="hidden" name="productId"  value="{{$prod->id}}" />
										<!-- <li><a  class="main-btn quick-view" href="" ><i class="fa fa-search-plus"></i> View More</a></li> -->
										</form>										<button class="main-btn icon-btn"><i class="fas fa-share-alt"></i></button>
										@if($objAuth!=null)
								<button  onClick='addProductCart({{$prod->id}})' id="addProductCart" class="main-btn icon-btn"><i class="fa fa-shopping-cart"></i></button>
								@else
								<button class="primary-btn add-to-cart" onclick="return alert('You Must Login First');" ><i class="fa fa-shopping-cart"></i> </button>
								@endif												</div>
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
						<form class="review-form" id="contact_us" method="post" >
                 
				 
				 
				  <input type="hidden" value="{{csrf_token()}}" id="token"/>
				         
						  <input type="hidden" id="shop_id" name="shop_id" value="{{$productShop}}" >
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
							@if($objAuth!=null)
							<button class="primary-btn" type="submit" >Submit</button>
						@endif
						</form>
					
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
									<p>{!!$shopSlider->description!!}
									<p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="about" id="about-2">
								<label for="about-2">Business Type </label>
								<div class="caption">
									<p>{!! $shopSlider->business_type !!}
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
							<input type="hidden" name="shop_id" value="{{$productShop}}" >
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

<script>

$(document).ready(function() {


//add review on shop 
 $('#contact_us').on('submit', function(e){
    event.preventDefault();
	
	var token = $("#token").val();
	alert('>>>'+token+'>>'+$("#name").val()+'>>'+$("#email").val()+'>>'+$("#reviewss").val()+'>>'+$("#shop_id").val()+'>>'+ $("input[name='rating']:checked").val());
    $.ajax({
        url:"{{route('testReview')}}",
        type: 'post',
		
		data:
		{
			_token:token,
			name:$("#name").val(),
			email:$("#email").val(),
			review:$("#reviewss").val(),
			shop_id:$("#shop_id").val(),
			rating:$("input[name='rating']:checked").val(),	
		} ,
        success: function(response){
		alert(response);

			location.reload();
	
        },
        error: function(response){
		
        }
    });
 });
//end add review on shop 

//get brand


$('form input[name=brandId]').change(function() {

 event.preventDefault();
 $("#target").submit();
 var token = $("#catToken").val();
 var selection=$('#selectSort option:selected').val();
 var billToBrand= [];
 var billToEmail= [];
 var billToGender= [];
 var billToOffer= [];
$("input:checkbox[name=OffersId]:checked").each(function(){
	billToOffer.push($(this).val());
});
$("input:checkbox[name=genderId]:checked").each(function(){
	billToGender.push($(this).val());
});
$("input:checkbox[name=catId]:checked").each(function(){
  billToEmail.push($(this).val());
});

$("input:checkbox[name=brandId]:checked").each(function(){
	billToBrand.push($(this).val());
});

$.ajax({
	type: 'get',
	url: "{{ URL::to('fetch_productBrands') }}",
		data:
	{
		 _token:token,
		 selection:$('#selectSort option:selected').val(),
		brands:billToBrand,

		genders:billToGender,
		offers:billToOffer,
		ids:billToEmail,
		start:$("#startPrice").val(),
		end:$("#endPrice").val(),	
		
	} ,
	success: function(response){

	
		$('#main').html(response);
		$('#selectSort option[value="'+selection+'"]').prop('selected', true);


	},
	error: function(response){
	  

	}
});
});
//End brand

//get gender


$('form input[name=genderId]').change(function() {

 event.preventDefault();
 $("#target").submit();
 var token = $("#catToken").val();
 var selection=$('#selectSort option:selected').val();
 var billToBrand= [];
 var billToEmail= [];
 var billToGender= [];
 var billToOffer= [];
$("input:checkbox[name=OffersId]:checked").each(function(){
	billToOffer.push($(this).val());
});
$("input:checkbox[name=genderId]:checked").each(function(){
	billToGender.push($(this).val());
});
$("input:checkbox[name=catId]:checked").each(function(){
  billToEmail.push($(this).val());
});

$("input:checkbox[name=brandId]:checked").each(function(){
	billToBrand.push($(this).val());
});

$.ajax({
	type: 'get',
	url: "{{ URL::to('fetch_productBrands') }}",
		data:
	{
		 _token:token,
		 selection:$('#selectSort option:selected').val(),
		brands:billToBrand,
		genders:billToGender,
		offers:billToOffer,
		ids:billToEmail,
		start:$("#startPrice").val(),
		end:$("#endPrice").val(),	
		
	} ,
	success: function(response){

	
		$('#main').html(response);
		$('#selectSort option[value="'+selection+'"]').prop('selected', true);


	},
	error: function(response){
	  

	}
});
});
//End Gender

//get Offers


$('form input[name=OffersId]').change(function() {
 event.preventDefault();
 $("#target").submit();
 var token = $("#catToken").val();
 var selection=$('#selectSort option:selected').val();
 var billToBrand= [];
 var billToEmail= [];
 var billToGender= [];
 var billToOffer= [];
 $("input:checkbox[name=OffersId]:checked").each(function(){
	billToOffer.push($(this).val());
 });
 $("input:checkbox[name=genderId]:checked").each(function(){
	billToGender.push($(this).val());
 });
 $("input:checkbox[name=catId]:checked").each(function(){
  billToEmail.push($(this).val());
 });

$("input:checkbox[name=brandId]:checked").each(function(){
	billToBrand.push($(this).val());
});

$.ajax({
	type: 'get',

	url: "	{{ URL::to('fetch_productOffers') }}",
		data:
	{
		 _token:token,
		 selection:$('#selectSort option:selected').val(),
		brands:billToBrand,
		genders:billToGender,
		offers:billToOffer,
		ids:billToEmail,
		start:$("#startPrice").val(),
		end:$("#endPrice").val(),	
		
	} ,
	success: function(response){

	
		$('#main').html(response);
		$('#selectSort option[value="'+selection+'"]').prop('selected', true);


	},
	error: function(response){
	  

	}
});
});
//End

//get all product Category

$('form input[name=catId]').change(function() {

    event.preventDefault();
    $("#target").submit();
    var token = $("#catToken").val();
	var selection=$('#selectSort option:selected').val();
	var billToBrand= [];
  var billToEmail= [];
   var billToGender= [];
  var billToOffer= [];
$("input:checkbox[name=OffersId]:checked").each(function(){
	billToOffer.push($(this).val());
});
$("input:checkbox[name=genderId]:checked").each(function(){
	billToGender.push($(this).val());
});
$("input:checkbox[name=catId]:checked").each(function(){
  billToEmail.push($(this).val());
});

$("input:checkbox[name=brandId]:checked").each(function(){
	billToBrand.push($(this).val());
});
// alert(billToEmail);

    $.ajax({
        type: 'Get',
		
        url: "{{ URL::to('fetch_productWhere') }}",
    		data:
		{
			_token:token,
			selection:$('#selectSort option:selected').val(),
			brands:billToBrand,
		genders:billToGender,
		offers:billToOffer,
		ids:billToEmail,
		start:$("#startPrice").val(),
		end:$("#endPrice").val(),	
			
		} ,
        success: function(response){

		
            $('#main').html(response);
			$('#selectSort option[value="'+selection+'"]').prop('selected', true);
	
	
        },
        error: function(response){
          
	
        }
    });
});
// end category product
//get price

$('#find').click(function() {
	event.preventDefault();
    $("#target").submit();
    var token = $("#catToken").val();
	var selection=$('#selectSort option:selected').val();
	var billToBrand= [];
var billToEmail= [];
var billToGender= [];
var billToOffer= [];

$("input:checkbox[name=OffersId]:checked").each(function(){
	billToOffer.push($(this).val());
});
$("input:checkbox[name=genderId]:checked").each(function(){
	billToGender.push($(this).val());
});
$("input:checkbox[name=catId]:checked").each(function(){
  billToEmail.push($(this).val());
});

$("input:checkbox[name=brandId]:checked").each(function(){
	billToBrand.push($(this).val());
});


$.ajax({
    type: 'post',

    url: "{{ URL::to('fetch_productPrice') }}",
        data:
    {
		_token:token,
		selection:$('#selectSort option:selected').val(),
		brands:billToBrand,
		genders:billToGender,
		offers:billToOffer,
		ids:billToEmail,
		start:$("#startPrice").val(),
		end:$("#endPrice").val(),	
        
    } ,
    success: function(response){

    
        $('#main').html(response);
		$('#selectSort option[value="'+selection+'"]').prop('selected', true);


    },
    error: function(response){
      

    }
});
});
//end price

//sorting product list
$(document).on('change', '#selectSort', function(event){
	event.preventDefault(); 
	$("#target").submit();

  var token = $("#catToken").val();
  var selection=$('#selectSort option:selected').val();
  fetch_sortdata(selection);
  
 });


 function fetch_sortdata(selection,token)
 {
	event.preventDefault();
    $("#target").submit();
    var token = $("#catToken").val();
	var billToBrand= [];
var billToEmail= [];
var billToGender= [];
var billToOffer= [];
$("input:checkbox[name=OffersId]:checked").each(function(){
	billToOffer.push($(this).val());
});
$("input:checkbox[name=genderId]:checked").each(function(){
	billToGender.push($(this).val());
});
$("input:checkbox[name=catId]:checked").each(function(){
  billToEmail.push($(this).val());
});

$("input:checkbox[name=brandId]:checked").each(function(){
	billToBrand.push($(this).val());
});


      
  $.ajax({
    type: 'get',
	
    url:"{{ URL::to('selectSort') }}",
	data:  {
		selection:$('#selectSort option:selected').val(),
       			_token:token,
		brands:billToBrand,
		genders:billToGender,
		offers:billToOffer,
		ids:billToEmail,
		start:$("#startPrice").val(),
		end:$("#endPrice").val(),	
            } ,

   success:function(data)
   {
     
    $('#main').html(data);
	
	$('#selectSort option[value="'+selection+'"]').prop('selected', true);

   }
  });
 }
//end Sorting
//srart pagination review

$(document).on('click', '#review .pagination a', function(event){
  event.preventDefault(); 
  var page = $(this).attr('href').split('page=')[1];
  fetch_data(page);
 });

// paginate product
$(document).on('click', '#productt .pagination a', function(event){
  event.preventDefault(); 
  var page = $(this).attr('href').split('page=')[1];
  $("#target").submit();
  var token = $("#catToken").val();
  var billToBrand= [];
var billToEmail= [];
var billToGender= [];
var billToOffer= [];
$("input:checkbox[name=OffersId]:checked").each(function(){
	billToOffer.push($(this).val());
});
$("input:checkbox[name=genderId]:checked").each(function(){
	billToGender.push($(this).val());
});
$("input:checkbox[name=catId]:checked").each(function(){
  billToEmail.push($(this).val());
});

$("input:checkbox[name=brandId]:checked").each(function(){
	billToBrand.push($(this).val());
});
  fetch_productdata(page,token,billToBrand,billToEmail,billToGender,billToOffer);

 });
// End paginate product
//function of pagination product

 function fetch_productdata(page,token,billToBrand,billToEmail,billToGender,billToOffer)
 {
	var selection=$('#selectSort option:selected').val();
  $.ajax({
    type: 'post',
	
    url:"{{ URL::to('fetch_productPrice') }}?page="+page,
    data:
    {
		selection:$('#selectSort option:selected').val(),
		_token:token,
		brands:billToBrand,
		genders:billToGender,
		offers:billToOffer,
		ids:billToEmail,
		start:$("#startPrice").val(),
		end:$("#endPrice").val(),
        } ,

   success:function(data)
   {
      
    $('#main').html(data);
	$('#selectSort option[value="'+selection+'"]').prop('selected', true);
   }
  });
 }
//End function of pagination product

 function fetch_data(page)
 {
  $.ajax({
	
    url:"{{ URL::to('fetch_data') }}?page="+page,
   success:function(data)
   {
    $('#product-reviews').html(data);
   }
  });
 }


});

</script>  

 @endsection