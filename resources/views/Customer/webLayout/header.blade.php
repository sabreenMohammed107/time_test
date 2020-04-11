<!-- HEADER -->
<header>
		<!-- top Header -->
		<div id="top-header" style="background-color:#82ae46">
			<div class="container">
				<div class="pull-left">
					<span style="color:white;text-transform:uppercase"><i class="fas fa-bullhorn"></i> Whatever you've got in mind .. we've got inside</span>
				</div>
				<div class="pull-right">
					<ul class="header-top-links">
						<li><a style="color:white !important"><i class="fab fa-app-store-ios"></i> App Store</a></li>
						<li><a style="color:white !important"><i class="fab fa-google-play"></i> Google Play</a></li>
						<li class="dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" style="color:white !important" id="mainLang">EN <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
							<li class="ms-nav-item  mt-2">
			
								<li><a id="switch-langen" href="{{ URL::to('changeLang/en')}}">English (ENG)</a></li>
								<li><a id="switch-langar" href="{{ URL::to('changeLang/ar')}}">Arabic (Ar)</a></li>
								<li><a href="#">French (FR)</a></li>
								<li><a href="#">Spanish (Es)</a></li>
							</ul>
						</li>
						<li class="dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" style="color:white !important">USD <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="#">USD ($)</a></li>
								<li><a href="#">EUR (€)</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /top Header -->
		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="#">
							<img src="{{ asset('webasset/images/time-logo.jpeg')}}" style="max-width:100px;max-height:50px" />
						</a>
					</div>
					<!-- /Logo -->
					<!-- Search -->
					<div class="header-search">
					
						<form class="form-control-lg">
							<input class="input search-input" id="searchIndex" type="text" placeholder="Enter your keyword...">
							<input type="hidden" id="id_personne" class="form-control"/>
							<select id="NameForSearch" class="input search-categories">
								<option value="0">Product</option>
								<option value="1">Category</option>
								<option value="2">shop</option>
							</select>
							
							<button class="search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- /Search -->
				</div>
								
			
				<div id="pull-right" class="pull-right">
			<?php
			$clienId=2;
			?>
					<ul class="header-btns">
						<!-- Account -->
						<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-user"></i>
								</div>
								@if($objAuth!=null)
								<strong class="text-uppercase">{{$objAuth->name}}<i class="fa fa-caret-down"></i></strong>
								@else
								<strong class="text-uppercase">My Account Name <i class="fa fa-caret-down"></i></strong>
								@endif	
							</div>
							@if($objAuth!=null)
							<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Logout
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
							@else
							<a href="{{ route('login') }}" class="text-uppercase">Login</a> / <a href="{{ route('register') }}" class="text-uppercase">Join</a>
	
							@endif	
							<ul class="custom-menu">
							<li role="presentation"  >
							@if($objAuth!=null)
							<a   href="{{ url('profile/'.$objAuth->id) }}" ><i class="fa fa-user-o"></i> My Account</a>
							@else
									<a href="{{ route('login') }}"  ><i class="fa fa-user-o"></i> My Account</a>
									@endif	
							</li>
								<li><a href="#"><i class="fa fa-heart-o"></i> My Wishlist</a></li>
								<li><a href="#"><i class="fa fa-exchange"></i> Compare</a></li>
								@if($objAuth!=null)
								<li><a href="{{ url('profilePass/'.$objAuth->id)}}" ><i class="fa fa-user-o"></i> Change Password</a></li>
								@endif	
								<li><a href="#"><i class="fa fa-check"></i> Checkout</a></li>
								
								<li>
								@if($objAuth!=null)
								<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								<i class="fa fa-unlock-alt"></i> Logout
                                     </a>

                               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          {{ csrf_field() }}
                                </form>
                                 @else
								<li><a href="{{ route('login') }}"><i class="fa fa-unlock-alt"></i> Login</a></li>
								<li><a href="{{ route('register') }}"><i class="fa fa-user-plus"></i> Create An Account</a></li>
								@endif	
							</ul>
						</li>
						<!-- /Account -->
						<!-- Cart -->
			
						<li class="header-cart dropdown default-dropdown">
					
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
									<span class="qty">{{$countNum}}</span>
								</div>
								<strong class="text-uppercase">My Cart</strong>
								<br>
								<span>35.20 EGP</span>
							</a>
							<div class="custom-menu">
								<div id="shopping-cart">
									<div class="shopping-cart-list">
										<div class="product product-widget">
											<div class="product-thumb">
												<img src="{{ asset('webasset/images/thumb-product01.jpg')}}" alt="" />
											</div>
											<div class="product-body">
												<h3 class="product-price">32.50 EGP<span class="qty">x3</span></h3>
												<h2 class="product-name"><a href="#">Product Name</a></h2>
											</div>
											<button class="cancel-btn"><i class="fa fa-trash"></i></button>
										</div>
										<div class="product product-widget">
											<div class="product-thumb">
												<img src="{{ asset('webasset/images/thumb-product02.jpg')}}" alt="" />
											</div>
											<div class="product-body">
												<h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
												<h2 class="product-name"><a href="#">Product Name</a></h2>
											</div>
											<button class="cancel-btn"><i class="fa fa-trash"></i></button>
										</div>
									</div>
									
									<div class="shopping-cart-btns">
									@if($objAuth!=null)
									<a href="{{route('cartShowing',$objAuth->id)}}" class="main-btn">View Cart</a>
									@else
									<a href="{{ route('login') }}" class="main-btn">View Cart</a>
									@endif	
										<button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button>
									</div>
								</div>
							</div>
						</li>
						<!-- /Cart -->
						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->