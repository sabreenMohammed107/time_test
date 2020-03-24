<div class="product-body">
<div class="alert alert-success" id="addFavour" role="alert" style="display:none;" >The Product has been added to Your Favourites</div>
<div class="alert alert-danger" id="delFa" role="alert" style="display:none;" >The Product has been removed from Your Favourites</div>

							<div class="product-label">
							@if($productData->new_flag >0 )
							<span>New</span>
		             		@endif
							@if($productData->discount_perc >0 )
							<span class="sale" style="background-color:#82ae46">-{{$productData->discount_perc}}%</span>
							@endif
							
								<div class="pull-right">


								<?php
								$isFavourite=false;
								?>

									@foreach($Favourites as $favourite)



       @if($favourite ==$productData->id)
	          {{$isFavourite = true}}
	
        @break

       @endif
	

 @endforeach
 @if($isFavourite)

 <button class="main-btn icon-btn" id="deFavButton{{$productData->id}}" onClick="deleteFavourites({{$productData->id}})"><i class="fa fa-heart text-success"></i></button>
 @else
 		<button class="main-btn icon-btn" id="favButton{{$productData->id}}" onClick="addToFavourites({{$productData->id}})" ><i class="fa fa-heart "></i></button>
       @endif
									
									<button class="main-btn icon-btn" style="background-color:#82ae46"><i class="fa fa-share-alt" style="color:white"></i></button>
								</div>
							</div>
							
							<h2 class="product-name">{{$productData->en_name}}</h2>
							@if($productData->discount_perc >0 )
								<h3 class="product-price">{{round($productData->price -($productData->discount_perc * $productData->price/ 100))}}
										<del class="product-old-price">{{$productData->price}}</del>	</h3>
										@else
										<h3 class="product-price">{{$productData->price}}</h3>
										@endif
							
							<div>
							@foreach(range(1,5) as $i)
										<div class="product-rating">
										@if(($productData->total_stars_rate) >=$i )
										<i class="fa fa-star"></i>
										@else
										<i class="fa fa-star-o empty"></i>
										@endif
											
										</div>
										@endforeach
							

								<a href="#">3 Review(s)</a>
								</div>
							</div>
							<p><strong>Availability:</strong> 
							@if($productData->qty_in_stock >0 )
							In Stock
										@else
									Not Found / Comming Soon
										@endif
							
							</p>
							<p><strong>Brand: </strong>

							<a>{{$productData->brand->name}}</a>
							</p>
							<p><strong>Shop : </strong>
							<a href="{{ url('shop/'.$productData->shop->id) }}">{{$productData->shop->en_name}}</a></p>
							<p>
							{{$productData->en_description}}
							</p>
							<br/>
				
						</div>