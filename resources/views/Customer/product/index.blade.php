@extends('Customer.webLayout.mainShop')
@section('content')
<!-- Start BREADCRUMB -->
<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li><a href="#">Products</a></li>
				<li><a href="#">Category</a></li>
				<li class="active" style="color:#82ae46">{{$productData->en_name}}</li>
			</ul>
		</div>
	</div>
	<!-- End BREADCRUMB -->
	
		<!-- Start Product Details -->
		<div class="section">
		<div class="container">
			<div class="row">
			<div class="addCart alert alert-success" id="addCart"  role="alert" style="display:none;" >The Product has been added to Your Cart</div>
<div class="delCart alert alert-danger" id="delCart" role="alert" style="display:none;" >The Product Not add in your cart</div>
				<div class="product product-details clearfix">
					<div class="col-md-4">
						<div id="product-main-view">
						@foreach($productSlider as $slider)
							<div class="product-view">
						
								<img src="{{ asset('uploads/homeShop/'.$slider->image) }}" alt="">
							
							</div>
							@endforeach
						</div>
						<br />
						<div id="product-view">
						@foreach($productSlider as $slider)
							<div class="product-view">
								<img src="{{ asset('uploads/homeShop/'.$slider->image) }}" alt="">
							</div>
							@endforeach
						
						</div>
					</div>
					<div class="col-md-6">
					<div id="vafouriteContent" >
					
				   @include('Customer.product.favourite')
					</div>
			</div>

					<div class="col-md-12">
					@if($objAuth!=null)
								<button  onClick='addProductCart({{$productData->id}})' id="addProductCart" class="primary-btn">Add To Cart <i class="fa fa-arrow-circle-right"></i></button>
								@else
								<button class="primary-btn" onclick="return alert('You Must Login First');" >Add To Cart <i class="fa fa-arrow-circle-right"></i></button>
								@endif		

						<div class="product-tab">
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Reviews (3)</a></li>
								<li><a data-toggle="tab" href="#tab2">Details</a></li>
								<li><a data-toggle="tab" href="#tab3">Description</a></li>
							</ul>
							<div class="tab-content">
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-6">
											<div class="product-reviews" id="productPageReview">
											@include('Customer.product.reviewProduct')										
										</div>
										</div>
										<div class="col-md-6">
											<h4 class="text-uppercase">Write Your Review</h4>
											<p>Your email address will not be published.</p>
											<form class="review-form" id="addingReview" method="post" action="javascript:void(0)">
											<input type="hidden" value="{{$productData->id}}" id="productId"/>
				 <input type="hidden" value="{{csrf_token()}}" id="token"/>
												<div class="form-group">
													<input class="input" type="text" id="name" name="name" placeholder="Your Name" />
												</div>
												<div class="form-group">
													<input class="input" type="email" id="email" name="email" placeholder="Email Address" />
												</div>
												<div class="form-group">
													<textarea class="input" name="reviewMsg" id="reviewMsg" placeholder="Your review"></textarea>
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
												<button class="primary-btn">Submit</button>
												@endif
											</form>
								
										</div>
									</div>
								</div>
								<div id="tab2" class="tab-pane fade in">
									<table class="table table-responsive">
										<tbody>
										@foreach($productFeatures as $productFeature)
										@if($productFeature->feature->master_features == 0)
											<tr>
										
												<td class="align-content-start">{{$productFeature->feature->feature_text}}</td>
												<td class="align-content-center">{{$productFeature->value}}</td>
												<td></td>
												<!-- <td>Printing Methods</td>
												<td>Heat-transfer Printing</td> -->
											</tr>
											@endif
											@endforeach
											
											
										</tbody>
									</table>
								</div>
								<div id="tab3" class="tab-pane fade in">
									<table class="table table-bordered">
										<tbody>
										@foreach($productFeatures as $productFeature)
										@if($productFeature->feature->master_features == 1)
											<tr>
												<td class="cart_product_img d-flex align-items-center"><strong>{{$productFeature->feature->feature_text}}</strong></td>
												<td class="cart_product_img d-flex align-items-center"><h6>{{$productFeature->value}}</h6></td>
													</tr>
											@endif
											@endforeach
											
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Product Details -->
	<!--Start RELATED PRODUCTS-->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="addCart alert alert-success" id="addCart"  role="alert" style="display:none;" >The Product has been added to Your Cart</div>
              <div class="delCart alert alert-danger" id="delCart" role="alert" style="display:none;" >The Product Not add in your cart</div>
		
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h4 class="title">Related Products</h4>
					</div>
				</div>
				<!-- section title -->
				<!-- Product Single -->
				@foreach($relatedProduct as $related)
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
						<div class="product-label">
						@if($related->product->new_flag >0 )
							<span>New</span>
		             		@endif
							@if($related->product->discount_perc >0 )
							<span class="sale" style="background-color:#82ae46">-{{$related->product->discount_perc}}%</span>
							@endif
							
												</div>
							<img src="{{ asset('uploads/homeShop/'.$related->product->main_image)}}" />
						</div>
						<div class="product-body">
						@if($related->product->discount_perc >0 )
								<h3 class="product-price">{{round($related->product->price -($related->product->discount_perc * $related->product->price/ 100))}}
										<del class="product-old-price">{{$related->product->price}}</del>	</h3>
										@else
										<h3 class="product-price">{{$related->product->price}}</h3>
										@endif						
																	@foreach(range(1,5) as $i)
										<div class="product-rating">
										@if(($related->product->total_stars_rate) >=$i )
										<i class="fa fa-star"></i>
										@else
										<i class="fa fa-star-o empty"></i>
										@endif
											
										</div>
										@endforeach
							<h2 class="product-name"><a href="#"> {{$related->product->en_name}}</a></h2>
							<div class="product-btns">
							<form action="{{route('product')}}" method="get">
										<button class="main-btn quick-view" type="submit"><i class="fa fa-search-plus"></i> View More</button>

											<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
											<input type="hidden" name="productId" id="productId" value="{{$related->product->id}}" />
										<!-- <li><a  class="main-btn quick-view" href="" ><i class="fa fa-search-plus"></i> View More</a></li> -->
										</form>
								<button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
								@if($objAuth!=null)
								<button  onClick='addProductCart({{$related->product->id}})' id="addProductCart" class="main-btn icon-btn"><i class="fa fa-shopping-cart"></i></button>
								@else
								<button class="primary-btn add-to-cart" onclick="return alert('You Must Login First');" ><i class="fa fa-shopping-cart"></i> </button>
								@endif										</div>
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

	<!--Start You May also like-->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="addCart alert alert-success" id="addCart"  role="alert" style="display:none;" >The Product has been added to Your Cart</div>
              <div class="delCart alert alert-danger" id="delCart" role="alert" style="display:none;" >The Product Not add in your cart</div>
		
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h4 class="title">You May Also Like</h4>
					</div>
				</div>
				<!-- section title -->
				@foreach($likedProduct as $liked)
				<!-- Product Single -->
				<div class="col-md-2 col-sm-4 col-xs-4">
					<div class="product product-single">
						<div class="product-thumb">
						<div class="product-label">
						@if($liked->new_flag >0 )
							<span>New</span>
		             		@endif
							@if($liked->discount_perc >0 )
							<span class="sale" style="background-color:#82ae46">-{{$liked->discount_perc}}%</span>
							@endif
							
							</div>
							<img src="{{ asset('uploads/homeShop/'.$liked->main_image) }}" />
						</div>
						<div class="product-body">

						@if($liked->discount_perc >0 )
								<h3 class="product-price">{{round($liked->price -($liked->discount_perc * $liked->price/ 100))}}
										<del class="product-old-price">{{$liked->price}}</del>	</h3>
										@else
										<h3 class="product-price">{{$liked->price}}</h3>
										@endif						
										
										
											@foreach(range(1,5) as $i)
										<div class="product-rating">
										@if(($liked->total_stars_rate) >=$i )
										<i class="fa fa-star"></i>
										@else
										<i class="fa fa-star-o empty"></i>
										@endif
											
										</div>
										@endforeach
							
							<h5 class="product-name"><a href="#">{{$liked->en_name}}</a></h5>
							<div class="product-btns">
							<form action="{{route('product')}}" method="get">
										<button class="main-btn quick-view" type="submit"><i class="fa fa-search-plus"></i> View More</button>

											<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
											<input type="hidden" name="productId" id="productId" value="{{$liked->id}}" />
										<!-- <li><a  class="main-btn quick-view" href="" ><i class="fa fa-search-plus"></i> View More</a></li> -->
										</form>
								<button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
								@if($objAuth!=null)
								<button  onClick='addProductCart({{$liked->id}})' id="addProductCart" class="main-btn icon-btn"><i class="fa fa-shopping-cart"></i></button>
								@else
								<button class="primary-btn add-to-cart" onclick="return alert('You Must Login First');" ><i class="fa fa-shopping-cart"></i> </button>
								@endif										</div>
						</div>
					</div>
				</div>
				<!-- /Product Single -->
				@endforeach
			
			</div>
			<!-- /row -->
			<!-- row -->
		
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!--End You May also like-->

@endsection
@section('scripts')

<script>
$(document).ready(function() {


$('#addingReview').on('submit', function(e){
    event.preventDefault();
	
    var token = $("#token").val();
	// alert('token'+token+"name"+$("#name").val()+"email"+$("#email").val()+"reviewMsg"+$("#reviewMsg").val()+"productId"+$("input[name='rating']:checked").val())
    $.ajax({
        url: "addProductReview",
        type: 'post',
    		data:
		{
			_token:token,
			name:$("#name").val(),
			email:$("#email").val(),
			reviewMsg:$("#reviewMsg").val(),
			productId:$("#productId").val(),
			rating:$("input[name='rating']:checked").val(),	
		} ,
        success: function(response){
		
			 location.reload();
			// $('#selectSort').val(data.selectData);
			// $('#productPageReview').html(response);

	
        },
        error: function(response){
          
		alert('you must put rate');
        }
    });
});

//paginate review
$(document).on('click', '#reviewProduction .pagination a', function(event){
  event.preventDefault(); 
  var page = $(this).attr('href').split('page=')[1];
  var token = $("#token").val();
//   $("#addingReview").submit();
     fetch_data(page,token);
 
 });
 function fetch_data(page,token)
 {
  $.ajax({
	
   
	type: 'post',
	url:"product/fetch_data?page="+page,
    		data:
		{
			_token:token,
		
			productId:$("#productId").val(),
		
		} ,
	
   success:function(data)
   {
    $('#productPageReview').html(data);
   }
  });
 }


//end document ready
});
function addToFavourites(itemid) {
   
   //    var token = $("#tokenVafourit").val();
	var item_id = itemid;
	var buttonId=('#deFavButton'+itemid);
	  alert(">>Add"+itemid+">>>"+ buttonId);
   
   
	  console.log('here');
	$.ajax({
		type: 'get',
		url: 'product/addfavourite',
		data:{
			item_id:itemid,
		   },
		  
		success: function(data){
			 alert('insert..');
			 $('#vafouriteContent').html(data);
   
			$('#favButton'+itemid+' i').addClass('text-success');
			   // location.reload();
			   $("#addFavour").fadeTo(2000, 500).slideUp(500, function() {
      $("#addFavour").slideUp(3000);
    });
		},
		error: function(response){
		  
		alert('you must check data / Login First');
		}
	});
   
   
   }
   function deleteFavourites(itemid) {
	  
	   var item_id = itemid;
	   var buttonId=('#deFavButton'+itemid);
	  alert(">>Del"+itemid+">>>"+ buttonId);
   
		 console.log('here');
	   $.ajax({
		   type: 'get',
		   url: 'product/deletefavourite',
		   data:{
			   item_id:itemid,
			  },
			 
		   success: function(data){
				alert('delete');
			   //  $('admin-cont').append(data);
   
				 $('#vafouriteContent').html(data);
			   $('#deFavButton'+itemid+' i').removeClass('text-success');
			   $("#delFa").fadeTo(2000, 500).slideUp(500, function() {
      $("#delFa").slideUp(3000);
    });
	   
   
		   },
		   error: function(response){
			 
			alert('you must check data / Login First');
		   }
	   });
	  
	  
	  }
   
</script>  
 @endsection