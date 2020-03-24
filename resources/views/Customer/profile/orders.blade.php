<div id="tab1" class="tab-pane fade in active">
										<div class="row">
											<div class="col-md-12">
												<div class="table-wrapper">
													<div class="table-title">
														<div class="row">
															<div class="col-sm-6">
																<h2>Manage <b>Orders</b></h2>
															</div>
															<div class="col-sm-6">

															</div>
														</div>
													</div>
													<div class="pull-right">
														<!-- <div class="sort-filter">
															<select class="" style="border:none !important; border-bottom:solid 1px #82ae46 !important;margin:10px 0px 10px 0px">
																<option value="0">All Orders</option>
																<option value="0">Delivered</option>
																<option value="0">Cancelled</option>
																<option value="0">Awaiting Delivery</option>
															</select>

														</div> -->
														<div id="clientOrders" class="review-body">
						                     	{!! $clientOreders->links() !!}
							</div>		
													</div>
													<table class="table table-striped table-hover">
														<thead>
														</thead>
														<tbody>
														@foreach($clientOreders as $orders)
															<tr>
																<td class="col-lg-2"><img src="{{ asset('webasset/images/time-logo.png')}}" style="border-radius:1rem ;width:100px ;height:100px" /></td>
																<td class="col-lg-8">
																	<h6>{{$orders->client_note}}</h6>
																	<h6><i class="fas fa-calendar-alt"></i>{{$orders->order_date}}</h6>
																	<h6><i class="fas fa-check-circle"></i>{{$orders->status->status}}</h6>
																	<h6><i class="fas fa-check-circle"></i>no-{{$orders->order_no}}</h6>
																	<a href="{{ url('shop/'.$orders->shops->id) }}" ><i class="fas fa-check-circle"></i>{{$orders->shops->en_name}}<a>
																</td>
																<td class="col-lg-2">
																	<a href="{{ url('orderDetails/'.$orders->id) }}"><h6><i class="fas fa-info" style="font-size:15px"></i> Details</h6></a>
																	<h6><i class="fas fa-pound-sign" style="font-size:15px"></i>{{$orders->net_value}}</h6>
																	<!--<a href="#"><h6><i class="fas fa-coins" style="font-size:15px"></i> 50 Points</h6></a>-->
																</td>

															</tr>
														@endforeach
													
														
														
														</tbody>

													</table>
													<div class="pull-right">
													
													</div>	
												</div>
											</div>
										</div>
									</div>