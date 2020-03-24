@extends('Customer.webLayout.mainShop')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Products</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	@include('Customer.category.filterSide')

	<!-- Start Related Product -->
    @if(Session::has('flash_success'))
                <div class="col-lg-12">
                    <div class="alert alert-success">
                        <strong><i class="fa fa-check-circle"></i> {!! session('flash_success') !!}</strong>
                    </div>
                </div>
            @endif
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
						<h4 class="title">Favourite Products</h4>
					</div>
				</div>
				<!-- section title -->
				@if($objAuth!=null)
                @foreach($items->favoriteProduct as $related)
             		<!-- Product Single -->
				<div class="col-md-4 col-sm-4 col-xs-4 related">
					<div class="row">
					<div class="product product-single">
						<div class="col-md-6 product-thumb">
							<div class="product-label">
							</div>
							<img src="{{ asset('uploads/homeShop/'.$related->main_image) }}" style="border-radius:1rem" />
						</div>
						<div class="col-md-6 product-body">
                        @if($related->discount_perc >0 )
								<h3 class="product-price">{{round($related->price -($related->discount_perc * $related->price/ 100))}}
										<del class="product-old-price">{{$related->price}}</del>	</h3>
										@else
										<h3 class="product-price">{{$related->price}}</h3>
										@endif	
							<h2 class="product-name" style="display:inline-block"><a href="#">{{$related->en_name}}</a></h2>
                            <br>
                            @foreach(range(1,5) as $i)
										<div class="product-rating">
										@if($related->total_stars_rate >=$i )
										<i class="fa fa-star"></i>
										@else
										<i class="fa fa-star-o empty"></i>
										@endif
									
									</div>
									@endforeach
							
							<div class="social-buttons" style="display:inline-block">
                         
							<form action="{{route('product')}}" method="get">
										<button class="main-btn quick-view" type="submit"><i class="fa fa-search-plus"></i> View More</button>

											<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
											<input type="hidden" name="productId" id="productId" value="{{$related->id}}" />
										</form>                                

            								<a id="share" class="main-btn icon-btn" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.jumia.com.eg%2Fgalaxy-m30s-6.4-inch-64gb4gb-dual-sim-mobile-phone-blue-samsung-mpg707271.html%3Futm_source%3Dfacebook%26utm_medium%3Dsocial%26utm_campaign%3Dpdpshare&quote=Check%20out%20this%20product%20on%20Jumia"  target="_blank" ><i class="fa fa-share-alt"></i></a>
											@if($objAuth!=null)
								<button  onClick='addProductCart({{$related->id}})' id="addProductCart" class="main-btn icon-btn"><i class="fa fa-shopping-cart"></i></button>
								@else
								<button class="primary-btn add-to-cart" onclick="return alert('You Must Login First');" ><i class="fa fa-shopping-cart"></i> </button>
								@endif										</div>
                            <!-- <p style="display:inline-block">{{$related->en_description}}</p> -->
						</div>
					</div>
					</div>
				</div>
				<!-- /Product Single -->
@endforeach
@endif
				<!-- btn Show more -->
				<div class="col-md-12" style="margin-top:40px">
					<button class="primary-btn add-to-cart">Show More</button>
				</div>
				<!-- /btn Show more -->
				</div>
			</div>
		</div>
	<!-- End Related Product -->

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
							<h1 class="primary-color">HOT DEAL<br><span class="white-color font-weak">ADS</span></h1>
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
							<h2 class="white-color">ADS</h2>
						</div>
					</a>
				</div>
				<!-- /banner -->
				<!-- banner -->
				<div class="col-md-4 col-sm-6">
					<a class="banner banner-1" href="#">
						<img src="{{ asset('webasset/images/shop/offer-3.jpg')}}" alt="">
						<div class="banner-caption text-center">
							<h2 class="white-color">ADS</h2>
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


	<!--Start Last Seen-->
	<div class="section">
					<!-- container -->
					<div class="container">
						<!-- row -->
						<div class="row">
							<!-- section title -->
							<div class="col-md-12">
								<div class="section-title">
									<h4 class="title">Last Seen</h4>
								</div>
							</div>
							<!-- section title -->
							@if($objAuth!=null)
                            @foreach($lastSeens->products as $prod)
							<!-- Product Single -->
							<div class="col-md-1 col-sm-2 col-xs-4">
								<div class="product product-single">
									<div class="product-thumb">
										<div class="product-label">
										</div>
										<img src="{{ asset('uploads/homeShop/'.$prod->main_image) }}" style="border-radius:1rem" />
									</div>
									<div class="product-body" style="margin:0px;padding:0px">
										<h6 class="product-price">{{$prod->price}}EGP</h6>
										<h6 class="product-name"><a href="#">{{$prod->en_name}}</a></h6>
									</div>
								</div>
							</div>
						@endforeach
						@endif
						</div>
						<!-- /row -->
					</div>
					<!-- /container -->
				</div>
	<!--End Last Seen-->

@endsection
@section('scripts')
<script>
function addToFavourites(itemid) {
   
    var token = $("#tokenVafourit").val();
  var item_id = itemid;
alert(">>"+itemid+">>>" +token);
$('#favButton').css('color', '#000');
    console.log('here');
  $.ajax({
      type: 'POST',
      url: 'addfavourite',
      data:{
          item_id:itemid,
          _token:token },
        
      success: function(data){
           alert('y...');
  
      },
      error: function(response){
        
      alert('you must check data');
      }
  });


}
$(document).ready(function() {
//get all product Category

$('form input[name=subId]').change(function() {

event.preventDefault();
$("#categoryTarget").submit();
var token = $("#subCatToken").val();
var selection=$('#selectSort option:selected').val();
var billToBrand= [];
var billToEmail= [];
var billToGender= [];
var billToOffer= [];
var billToShop= [];
$("input:checkbox[name=OffersId]:checked").each(function(){
billToOffer.push($(this).val());
});
$("input:checkbox[name=genderId]:checked").each(function(){
billToGender.push($(this).val());
});
$("input:checkbox[name=subId]:checked").each(function(){
billToEmail.push($(this).val());
});

$("input:checkbox[name=shopId]:checked").each(function(){
	billToShop.push($(this).val());
});

$("input:checkbox[name=brandId]:checked").each(function(){
billToBrand.push($(this).val());
});
 alert(">>>>"+$('#selectSort option:selected').val());

$.ajax({
	type: 'get',
	
	url: "{{ URL::to('fetch_productWhereCategory') }}",
		data:
	{
		_token:token,
		selection:$('#selectSort option:selected').val(),
		brands:billToBrand,
	genders:billToGender,
	offers:billToOffer,
	ids:billToEmail,
	shops:billToShop,
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

//get brand


$('form input[name=brandId]').change(function() {

event.preventDefault();
$("#categoryTarget").submit();
var token = $("#subCatToken").val();
var selection=$('#selectSort option:selected').val();
var billToBrand= [];
var billToEmail= [];
var billToGender= [];
var billToOffer= [];
var billToShop= [];
$("input:checkbox[name=OffersId]:checked").each(function(){
billToOffer.push($(this).val());
});
$("input:checkbox[name=genderId]:checked").each(function(){
billToGender.push($(this).val());
});
$("input:checkbox[name=subId]:checked").each(function(){
billToEmail.push($(this).val());
});

$("input:checkbox[name=shopId]:checked").each(function(){
	billToShop.push($(this).val());
});

$("input:checkbox[name=brandId]:checked").each(function(){
billToBrand.push($(this).val());
});
 alert(">>>>"+$('#selectSort option:selected').val());

$.ajax({
	type: 'get',
	
	url: "{{ URL::to('fetch_productBrandsCategory') }}",
		data:
	{
		_token:token,
		selection:$('#selectSort option:selected').val(),
		brands:billToBrand,
	genders:billToGender,
	offers:billToOffer,
	ids:billToEmail,
	shops:billToShop,
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
//End get brand
//get gender


$('form input[name=genderId]').change(function() {
	event.preventDefault();
$("#categoryTarget").submit();
var token = $("#subCatToken").val();
var selection=$('#selectSort option:selected').val();
var billToBrand= [];
var billToEmail= [];
var billToGender= [];
var billToOffer= [];
var billToShop= [];
$("input:checkbox[name=OffersId]:checked").each(function(){
billToOffer.push($(this).val());
});
$("input:checkbox[name=genderId]:checked").each(function(){
billToGender.push($(this).val());
});
$("input:checkbox[name=subId]:checked").each(function(){
billToEmail.push($(this).val());
});

$("input:checkbox[name=shopId]:checked").each(function(){
	billToShop.push($(this).val());
});

$("input:checkbox[name=brandId]:checked").each(function(){
billToBrand.push($(this).val());
});
 alert(">>>>"+$('#selectSort option:selected').val());

$.ajax({
	type: 'get',
	
	url: "{{ URL::to('fetch_productGendersCategory') }}",
		data:
	{
		_token:token,
		selection:$('#selectSort option:selected').val(),
		brands:billToBrand,
	genders:billToGender,
	offers:billToOffer,
	ids:billToEmail,
	shops:billToShop,
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
$("#categoryTarget").submit();
var token = $("#subCatToken").val();
var selection=$('#selectSort option:selected').val();
var billToBrand= [];
var billToEmail= [];
var billToGender= [];
var billToOffer= [];
var billToShop= [];
$("input:checkbox[name=OffersId]:checked").each(function(){
billToOffer.push($(this).val());
});
$("input:checkbox[name=genderId]:checked").each(function(){
billToGender.push($(this).val());
});
$("input:checkbox[name=subId]:checked").each(function(){
billToEmail.push($(this).val());
});

$("input:checkbox[name=shopId]:checked").each(function(){
	billToShop.push($(this).val());
});

$("input:checkbox[name=brandId]:checked").each(function(){
billToBrand.push($(this).val());
});
 alert(">>>>"+$('#selectSort option:selected').val());

$.ajax({
	type: 'get',
	
	url: "{{ URL::to('fetch_productOffersCategory') }}",
		data:
	{
		_token:token,
		selection:$('#selectSort option:selected').val(),
		brands:billToBrand,
	genders:billToGender,
	offers:billToOffer,
	ids:billToEmail,
	shops:billToShop,
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
//End Offers
//get price

$('#find').click(function() {
	event.preventDefault();
$("#categoryTarget").submit();
var token = $("#subCatToken").val();
var selection=$('#selectSort option:selected').val();
var billToBrand= [];
var billToEmail= [];
var billToGender= [];
var billToOffer= [];
var billToShop= [];
$("input:checkbox[name=OffersId]:checked").each(function(){
billToOffer.push($(this).val());
});
$("input:checkbox[name=genderId]:checked").each(function(){
billToGender.push($(this).val());
});
$("input:checkbox[name=subId]:checked").each(function(){
billToEmail.push($(this).val());
});

$("input:checkbox[name=shopId]:checked").each(function(){
	billToShop.push($(this).val());
});

$("input:checkbox[name=brandId]:checked").each(function(){
billToBrand.push($(this).val());
});
 alert(">>>>"+$('#selectSort option:selected').val());

$.ajax({
	type: 'POST',
	
	url: "{{ URL::to('fetch_productPriceCategory') }}",
		data:
	{
		_token:token,
		selection:$('#selectSort option:selected').val(),
		brands:billToBrand,
	genders:billToGender,
	offers:billToOffer,
	ids:billToEmail,
	shops:billToShop,
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
//End Price
//get shops


$('form input[name=shopId]').change(function() {
	event.preventDefault();
$("#categoryTarget").submit();
var token = $("#subCatToken").val();
var selection=$('#selectSort option:selected').val();
var billToBrand= [];
var billToEmail= [];
var billToGender= [];
var billToOffer= [];
var billToShop= [];
$("input:checkbox[name=OffersId]:checked").each(function(){
billToOffer.push($(this).val());
});
$("input:checkbox[name=genderId]:checked").each(function(){
billToGender.push($(this).val());
});
$("input:checkbox[name=subId]:checked").each(function(){
billToEmail.push($(this).val());
});

$("input:checkbox[name=shopId]:checked").each(function(){
	billToShop.push($(this).val());
});

$("input:checkbox[name=brandId]:checked").each(function(){
billToBrand.push($(this).val());
});
 alert(">>>>"+$('#selectSort option:selected').val());

$.ajax({
	type: 'get',
	
	url: "{{ URL::to('fetch_productShopCategory') }}",
		data:
	{
		_token:token,
		selection:$('#selectSort option:selected').val(),
		brands:billToBrand,
	genders:billToGender,
	offers:billToOffer,
	ids:billToEmail,
	shops:billToShop,
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
//End Shop
//sorting product list
$(document).on('change', '#selectSort', function(event){
	event.preventDefault(); 
	$("#categoryTarget").submit();

  var token = $("#subCatToken").val();
  var selection=$('#selectSort option:selected').val();
  fetch_sortdata(selection,token);
  
 });
 function fetch_sortdata(selection,token)
 {event.preventDefault();
$("#categoryTarget").submit();
var token = $("#subCatToken").val();
var selection=$('#selectSort option:selected').val();
var billToBrand= [];
var billToEmail= [];
var billToGender= [];
var billToOffer= [];
var billToShop= [];
$("input:checkbox[name=OffersId]:checked").each(function(){
billToOffer.push($(this).val());
});
$("input:checkbox[name=genderId]:checked").each(function(){
billToGender.push($(this).val());
});
$("input:checkbox[name=subId]:checked").each(function(){
billToEmail.push($(this).val());
});

$("input:checkbox[name=shopId]:checked").each(function(){
	billToShop.push($(this).val());
});

$("input:checkbox[name=brandId]:checked").each(function(){
billToBrand.push($(this).val());
});
 alert(">>>>"+billToEmail);

$.ajax({
	type: 'get',
	
	url: "{{ URL::to('selectSortCategory') }}",
		data:
	{
		_token:token,
		selection:$('#selectSort option:selected').val(),
		brands:billToBrand,
	genders:billToGender,
	offers:billToOffer,
	ids:billToEmail,
	shops:billToShop,
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
// paginate product
$(document).on('click', '#productt .pagination a', function(event){
  event.preventDefault(); 
  var page = $(this).attr('href').split('page=')[1];
  $("#categoryTarget").submit();
var token = $("#subCatToken").val();
var selection=$('#selectSort option:selected').val();
var billToBrand= [];
var billToEmail= [];
var billToGender= [];
var billToOffer= [];
var billToShop= [];
$("input:checkbox[name=OffersId]:checked").each(function(){
billToOffer.push($(this).val());
});
$("input:checkbox[name=genderId]:checked").each(function(){
billToGender.push($(this).val());
});
$("input:checkbox[name=subId]:checked").each(function(){
billToEmail.push($(this).val());
});

$("input:checkbox[name=shopId]:checked").each(function(){
	billToShop.push($(this).val());
});

$("input:checkbox[name=brandId]:checked").each(function(){
billToBrand.push($(this).val());
});
  fetch_productdata(page,token,billToBrand,billToEmail,billToGender,billToOffer,billToShop);

 });
 // End paginate product
//function of pagination product

function fetch_productdata(page,token,billToBrand,billToEmail,billToGender,billToOffer,billToShop)
 {
	var selection=$('#selectSort option:selected').val();
	$.ajax({
    type: 'post',
	
    url:"{{ URL::to('fetch_productPriceCategory') }}?page="+page,
    data:
    {
		_token:token,
		selection:$('#selectSort option:selected').val(),
		brands:billToBrand,
	genders:billToGender,
	offers:billToOffer,
	ids:billToEmail,
	shops:billToShop,
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

});
</script>

@endsection