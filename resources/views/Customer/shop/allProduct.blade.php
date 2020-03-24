<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
                <!-- ASIDE -->
                <form id="target" action="javascript:void(0)" method="post">
				<div id="aside" class="col-md-3">
                <input type="hidden" value="{{csrf_token()}}" id="catToken"/>
					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">All Product</h3>

						<ul class="list-links">
							<li>
								<h3 class="list-links-title">Categories</h3>
							</li>
							@foreach($shop->categories as $cat)
						
                            <li><input type="checkbox"  name="catId" value="{{$cat->id}}" />{{$cat->en_name}}</li>
                            <input type="hidden" value="{{$cat->id}}" id="catProduct"/>
						
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
								<p><input type="text" id="amount" name="amount" readonly style="border:0; color:#82ae46; font-weight:bold;font-size:17px"></p>
								<!-- <div id="slider-range"></div> -->
								<input type="number" value="0" id="startPrice" name="startPrice" >
								<input type="number" value="10000" id="endPrice" name="endPrice" >
								<button class="btn btn success" id="find" >find</button>
							</div>
						</div>
					</div>
					
					<!-- /aside widget -->
					<!-- aside widget -->
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
				</div>
</form>
				<!-- MAIN Product-->
				<div id="main" class="col-md-9">
					
                    @include('Customer.shop.catProduct')
			
                </div>
				<!-- /MAIN Product-->
			</div>
		</div>
	</div>