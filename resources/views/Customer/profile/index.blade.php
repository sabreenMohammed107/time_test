@extends('Customer.webLayout.mainShop')
@section('content')


	<!--Start banner-->
	<section>
		<div class="container"style="margin-top:10px">
				<img src="{{ asset('webasset/images/shop/banner-account-3.jpg')}}" style="min-width:100%;max-height:150px;border-radius:1rem;-webkit-box-shadow: 0px 11px 5px -9px rgba(130,174,70,1);
-moz-box-shadow: 0px 11px 5px -9px rgba(130,174,70,1);
box-shadow: 0px 11px 5px -9px rgba(130,174,70,1);" />
		</div>
	</section>
	<!--End banner--> 
<!--Start Account Data-->
<div class="container">
		<div class="row">
				<div class="col-md-12">
					<div class="product-tab"style="margin-top:50px;padding-top:0px">
						<div class="col-md-3">
							<ul class="table-wrapper aside" style="-webkit-box-shadow: -10px 10px 5px -9px rgba(130,174,70,1);-moz-box-shadow: -10px 10px 5px -9px rgba(130,174,70,1);box-shadow: -10px 10px 5px -9px rgba(130,174,70,1;">
								<li class="active aside-title account"><a data-toggle="tab" href="#tab1"><i class="fas fa-angle-double-right"></i> My Account</a></li>
								<li class="aside-title account"><a data-toggle="tab" href="#tab2"><i class="fas fa-angle-double-right"></i> My Orders</a></li>
								<li class="aside-title account"><a data-toggle="tab" href="#tab3"><i class="fas fa-angle-double-right"></i> My Favourites</a></li>
								
							</ul>
						</div>
						<div class="col-md-9">
							<div class="tab-content">
								<div id="tab1" class="tab-pane fade in active">
									@include('Customer.profile.account')
								</div>
								<div id="tab2" class="tab-pane fade in">
                                @include('Customer.profile.orders')
								</div>
								<div id="tab3" class="tab-pane fade in">
                                @include('Customer.profile.favourite')
								</div>
								
				
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
	<!--End Account Data-->

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
				        @if($objAuth !=null)
							@foreach($clientٍSeen->products as $prod)
					<!-- Product Single -->
					<div class="col-md-1 col-sm-2 col-xs-4">
					<div class="product product-single">
						<div class="product-thumb">
							<div class="product-label">
						
							</div>
							<img src="{{ asset('uploads/homeShop/'.$prod->main_image) }}" style=" height:120px; " alt="">
						</div>
						<div class="product-body" style="margin:15px;padding:0px">
						@if($prod->discount_perc >0 )
								<h3 class="product-price">{{round($prod->price -($prod->discount_perc * $prod->price/ 100))}}
										<del class="product-old-price">{{$prod->price}}</del>	</h3>
										@else
										<h3 class="product-price">{{$prod->price}}</h3>
										@endif		
										<h2 class="product-name"><a href="#">{{$prod->en_name}}</a></h2>
						</div>
					</div>
				</div>
				@endforeach
			    @endif
				<!-- /Product Single -->
				
			</div>
			
		</div>
		<!-- /container -->
	</div>
	<!--End Last Seen-->
	
	

@endsection
@section('scripts')
<script>

$(document).ready(function() {


//update account
$('#updatAccount').on('submit', function(e){
    event.preventDefault();
	var token = $("#tokenAccount").val();
alert("here");
    
    $.ajax({
        type: 'post',
       
        url:"{{url('/updateAccount')}}",
       
		
		data:
		{
			_token:token,
			name:$("#name").val(),
			new_password:$("#new_password").val(),
			email:$("#email").val(),
			phone:$("#phone").val(),
			job:$("#job").val(),
			company:$("#company").val(),
			gender:$("#gender").val(),
			postal:$("#postal").val(),

		
        } ,
        success: function(response){
		alert(response);

        $('#tab1').html(response);
	
        },
        error: function(response){
		
        }
    });
});

//pagination
$(document).on('click', '#favorit .pagination a', function(event){
  event.preventDefault(); 
  var page = $(this).attr('href').split('page=')[1];
  fetch_data(page);
 });
 
 
 function fetch_data(page)
 {
  $.ajax({
	
    url:"{{ URL::to('fetch_data') }}?page="+page,
   
   success:function(data)
   {
    $('#tab3').html(data);
   }
  });
 }
//order paginate
$(document).on('click', '#clientOrders .pagination a', function(event){
  event.preventDefault(); 
  var page = $(this).attr('href').split('page=')[1];
  fetch_orderData(page);
 });
 function fetch_orderData(page)
 {
  $.ajax({
	
    url:"{{ URL::to('fetch_orderData') }}?page="+page,
   
   success:function(data)
   {
    $('#tab2').html(data);
   }
  });
 }
});


function removeFromFavourites(itemid) {
	  
	  var item_id = itemid;
  alert('hello');
		
	  $.ajax({
		  type: 'get',
		  url: "{{ URL::to('deleteFromFavourite') }}",
		  data:{
			  item_id:itemid,
			 },
			
		  success: function(data){

			   alert('delete');
			   $('#tab3').html(data);
			}
			,

		  error: function(response){
			  alert('No');
			
		 
		  }
   });
	  
  
	 }
</script>
@endsection
