@extends('Customer.mainShop')
@section('product')
			<!-- store top filter -->
          
					<!-- store top filter -->
					<div id ="testing">
					<div class="store-filter clearfix">
						<div class="pull-left">
							<div class="header-search">
								<form>
									<input class="input search-input" type="text" placeholder="Enter your keyword">
									<button class="search-btn"><i class="fa fa-search"></i></button>
								</form>
							</div>
						</div>
						<div class="pull-right">
							<div class="sort-filter">
								<span class="text-uppercase">Sort By:</span>
								<select class="input">
									<option value="0">Newest</option>
									<option value="0">Price</option>
									<option value="0">Rating</option>
								</select>
							</div>
							<div id="product">
									{!! $productsCat->links() !!}
								
								</div>
						</div>
					</div>
					<div id="store">
						<!-- row -->
						<div class="row">
							<!-- Product Single -->
							@foreach($productsCat as $product)
							<!-- <input type="hidden" id="prodId" value="10"> -->
							<div class="col-md-3 col-sm-4 col-xs-4">
								<div class="product product-single">
									<div class="product-thumb">
									<div class="product-label">
									@if($product->new_flag >0 )
											<span>New</span>
											@endif
											@if($product->discount_perc >0 )
											<span class="sale">-{{$product->discount_perc}}%</span>
											@endif
										</div>
										<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> View More</button>
										
										<img src="{{ asset('uploads/homeShop/'.$product->main_image) }}" />
									</div>
									<div class="product-body">
									@if($product->discount_perc >0 )
										<h4 class="product-price">{{round($product->price -($product->discount_perc * $product->price/ 100))}}
										<del class="product-old-price">{{$product->price}}</del>	</h4>
										@else
										<h4 class="product-price">{{$product->price}}</h4>
										@endif
										
										@foreach(range(1,5) as $i)
										<div class="product-rating">
										@if($product->total_stars_rate >=$i )
										<i class="fa fa-star"></i>
										@else
										<i class="fa fa-star-o empty"></i>
										@endif
											
										</div>
										@endforeach
										<h5 class="product-name"><a href="#">{{$product->en_name}}</a></h5>
										<div class="product-btns">
											<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
											<button class="main-btn icon-btn"><i class="fas fa-share-alt"></i></button>
											<button class="main-btn icon-btn"><i class="fa fa-shopping-cart"></i></button>
										</div>
									</div>
								</div>
							</div>
							@endforeach
							<!-- /Product Single -->
							
						
						
						
						
						
							
						</div>
						<!-- /row -->
					</div>
					<!-- /STORE -->
					</div>
	@endsection