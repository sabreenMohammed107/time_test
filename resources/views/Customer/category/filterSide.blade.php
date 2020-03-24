<!-- section -->
<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- ASIDE -->
				<div id="aside" class="col-md-3">
                <form id="categoryTarget" action="javascript:void(0)" method="post">
					<!-- aside widget -->
                    <input type="hidden" value="{{csrf_token()}}" id="subCatToken"/>
					<div class="aside">
                    @foreach($subs as $sub )
						<h3 class="aside-title">{{$sub->en_name}} :</h3>

						<ul class="list-links">
							<li>
								<h3 class="list-links-title">SUP Categories</h3>
							</li>
                            @foreach($subSub as $subSub )
                            @if($subSub->id ==$category)
                            <li><input type="checkbox"  name="subId" value="{{$subSub->id}}" checked />{{$subSub->en_name}}</li><br>
                            @else
                            <li><input type="checkbox"  name="subId" value="{{$subSub->id}}" />{{$subSub->en_name}}</li><br>

                            @endif
                            <!-- <input type="hidden" value="{{$sub->id}}" id="subCatProduct"/> -->
                            @endforeach
						
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
								<!-- <p><input type="text" id="amount" readonly style="border:0; color:#82ae46; font-weight:bold;font-size:17px"></p>
								<div id="slider-range"></div> -->
                                <input type="number" value="0" id="startPrice" name="startPrice" >
								<input type="number" value="10000" id="endPrice" name="endPrice" >
								<button class="btn btn success" id="find" >find</button>
							</div>
						</div>
					</div>
				
					<div class="aside">
						<h3 class="aside-title">Filter by Brand</h3>
						<ul class="list-links  div-scroll">
                        @foreach($brands as $brand)
							<li><input type="checkbox" name="brandId" value="{{$brand->id}}"  class="input-checkbox" />{{ $brand->name}}</li>
							@endforeach
							
						</ul>
					</div>
					<!-- /aside widget -->
					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Filter by Shop</h3>
						<ul class="list-links  div-scroll">
                        @foreach($shops as $shop)
							<li><input type="checkbox" name="shopId" value="{{$shop->id}}"  class="input-checkbox" />{{ $shop->en_name}}</li>
							@endforeach

						</ul>
					</div>
					<!-- /aside widget -->
					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Filter by Gender</h3>
						<ul class="list-links  div-scroll">
                        @foreach($genders as $gender)
							<li><input type="checkbox" name="genderId" value="{{$gender->id}}"  class="input-checkbox" />{{ $gender->en_name}}</li>
							@endforeach
						</ul>
					</div>
					<!-- /aside widget -->
					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Filter by Offers</h3>
						<ul class="list-links">
                        <li><input type="checkbox" name="OffersId" value="10"  class="input-checkbox" />10% OFF</li>
						<li><input type="checkbox" name="OffersId" value="20"  class="input-checkbox" />20% OFF</li>
						<li><input type="checkbox" name="OffersId" value="30"  class="input-checkbox" />30% OFF</li>
						<li><input type="checkbox" name="OffersId" value="40"  class="input-checkbox" />40% OFF</li>
						<li><input type="checkbox" name="OffersId" value="50"  class="input-checkbox" />50% OFF</li>
						</ul>
					</div>
					<!-- /aside widget -->
                    </form>
					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Top Rated Product</h3>
						<!-- widget product -->
                        @foreach($topRelated as $topRelated)
						<div class="product product-widget">
							<div class="product-thumb">
                      
								<img src="{{ asset('uploads/homeShop/'.$topRelated->product->main_image) }}" />
							</div>
							<div class="product-body">
								<h2 class="product-name"><a href="#">{{$topRelated->product->en_name}}</a></h2>
                                @if($topRelated->product->discount_perc >0 )
								<h3 class="product-price">{{round($topRelated->product->price -($topRelated->product->discount_perc * $topRelated->product->price/ 100))}}
										<del class="product-old-price">{{$topRelated->product->price}}</del>	</h3>
										@else
										<h3 class="product-price">{{$topRelated->product->price}}</h3>
										@endif								
                                        @foreach(range(1,5) as $i)
										<div class="product-rating">
										@if($topRelated->product->total_stars_rate >=$i )
										<i class="fa fa-star"></i>
										@else
										<i class="fa fa-star-o empty"></i>
										@endif
									
									</div>
									@endforeach
							</div>
						</div>
                        @endforeach
						<!-- /widget product -->
					
						
						
						
						
					</div>
					<!-- /aside widget -->
				</div>
				<!-- /ASIDE -->
				<!-- MAIN Product-->
				<div id="main" class="col-md-9">
				@include('Customer.category.productList')
				</div>
				<!-- /MAIN Product-->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->