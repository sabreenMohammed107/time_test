<!-- store top filter -->
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
								<select class="input" name="selectSort" id="selectSort">
									<option value="0">Newest</option>
									<option value="1">Price</option>
									<option value="2">Rating</option>
								</select>
							</div>
						
							
                            <div id="productt" class="store-pages">
							
                            {!! $producttts->links() !!}
							</div>
						</div>
					</div>
					<!-- /store top filter -->
					<!-- STORE -->
					<div id="store">
					<div class="addCart alert alert-success" id="addCart"  role="alert" style="display:none;" >The Product has been added to Your Cart</div>
<div class="delCart alert alert-danger" id="delCart" role="alert" style="display:none;" >The Product Not add in your cart</div>

						<!-- row -->
						<div class="row">
							<!-- Product Single -->
							@foreach($producttts as $product)
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
										<form action="{{route('product')}}" method="get">
										<button class="main-btn quick-view" type="submit"><i class="fa fa-search-plus"></i> View More</button>

											<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
											<input type="hidden" name="productId" id="productId" value="{{$product->id}}" />
										<!-- <li><a  class="main-btn quick-view" href="" ><i class="fa fa-search-plus"></i> View More</a></li> -->
										</form>
											<button class="main-btn icon-btn"><i class="fas fa-share-alt"></i></button>
											@if($objAuth!=null)
								<button  onClick='addProductCart({{$product->id}})' id="addProductCart" class="main-btn icon-btn"><i class="fa fa-shopping-cart"></i></button>
								@else
								<button class="primary-btn add-to-cart" onclick="return alert('You Must Login First');" ><i class="fa fa-shopping-cart"></i> </button>
								@endif											</div>
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
			
			