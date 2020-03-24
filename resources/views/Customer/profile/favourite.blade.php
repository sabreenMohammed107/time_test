<div id="tab1" class="tab-pane fade in active">
										<div class="row">
											<div class="col-md-12">
												<div class="table-wrapper">
													<div class="table-title">
														<div class="row">
															<div class="col-sm-6">
																<h2>Favorites <b>Items</b></h2>
															</div>
															<div class="col-sm-6">

															</div>
														</div>
													</div>
													<div class="pull-right" style="margin:10px 0px 10px 0px">
													<div id="favorit" class="review-body">
						                     	{!! $favoriteProducts->links() !!}
							</div>
													</div>
													<table class="table table-striped table-hover">
														<thead>
														</thead>
														<tbody>
														@foreach($favoriteProducts as $fav)
				
															<tr>
																<td class="col-lg-2"><img src="{{ asset('uploads/homeShop/'.$fav->main_image) }}" style="border-radius:1rem ;width:100px ;height:100px" /></td>
																<td class="col-lg-8">
																	<h6>{{$fav->en_name}}</h6>
																	<h6><i class="fas fa-angle-double-right" style="font-size:12px"></i>{{$fav->price}}</h6>
																	<h6><i class="fas fa-heart"></i> Favorite</h6>
																</td>
																<td class="col-lg-2">
																	<button class="primary-btn" style="margin:0px 0px 10px 0px"> Buy Now</button>
																	<a onClick="removeFromFavourites({{$fav->id}})" ><i class="fas fa-trash-alt" style="font-size:15px"></i></a>
																</td>

															</tr>
															@endforeach
														</tbody>

													</table>
													
												</div>
											</div>
										</div>
									</div>