	<!-- row -->
    <div class="row">
					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Order Review</h3>
							</div>
							<table class="shopping-cart-table table" id="mytable">
								<thead style="background-color:#82ae46">
									<tr>
										<th></th>
										<th style="color:#ffffff">Product</th>
										<th class="text-center"style="color:#ffffff">Price</th>
										<th class="text-center"style="color:#ffffff">Quantity</th>
										<th class="text-center"style="color:#ffffff">Total</th>
										<th class="text-right"style="color:#ffffff"></th>
									</tr>
								</thead>
								@if($cartDetails!=null)
								@foreach($cartDetails as $details)
								<tbody>
									
								
									
								
									<tr>
										<td class="thumb"><img src="{{ asset('uploads/homeShop/'.$details->products->main_image) }}" alt=""></td>
										<td class="details">
											<a href="#">{{$details->products->en_name}}</a>
											
										</td>

                                        <td class="price text-center">
                                        @if($details->products->discount_perc >0 )
										<strong>{{round($details->products->price -($details->products->discount_perc * $details->products->price/ 100))}}</strong>
										<br><del class="font-weak"><small>>{{$details->products->price}}</small></del>
										@else
										<strong>{{$details->products->price}}</strong>
										@endif
                                       
                                        </td>
										
										<td class="qty text-center">
                                    
                                       <input class="input" type="text" readonly value="{{$details->product_qty}}">
                                     
                                      
                                      
                                        </td>
                                     
										<td class="total text-center">
                                        @if($details->products->discount_perc >0 )
                                        <strong name="price" class="primary-color">{{ round($details->products->price -($details->products->discount_perc * $details->products->price/ 100)) * $details->product_qty }}</strong>
                                        @else
                            <strong name="price"  class="primary-color">{{ $details->products->price * $details->product_qty }}</strong>
                                        @endif
                                        </td>
								

										<td class="text-right">
										<a href="#" data-toggle="modal" data-target="#editEmployeeModa1{{$details->id}}" class="btn d-inline-block btn-info">
										<i class="fa fa-edit"></i></a>
										
										<form  action="{{ route('destoryCart', $details->id) }}"  method="POST" >
									@csrf
								<button type="submit" class="main-btn icon-btn"><i class="fa fa-close"></i></button></td>

									</form>
									</tr>
                                   
								</tbody>
							
									<!-- Edit Modal HTML -->
									<div id="editEmployeeModa1{{$details->id}}" class="modal fade">
											<div class="modal-dialog">
												<div class="modal-content">
													<form id="updatCaart_{{$details->id}}" action="{{route('updatCart')}}" method="post">
													@csrf
														<div class="modal-header">
															<h4 class="modal-title">Edit Cart Data</h4>
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														</div>
														<div class="modal-body">
															<div class="form-group">
																<label>Update Quantity</label>
																<input type="hidden" name="testid" class="form-control" value="{{ $details->id }}" required>

																<input type="text" name="testqq" class="form-control" value="{{ $details->product_qty }}" required>
															</div>
														</div>
														<div class="modal-footer">
															<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
															<button type="submit"  class="btn btn-info" value="Save"></button>
														</div>
													</form>
												</div>
											</div>
										</div>
										@endforeach
										@endif
								<tfoot>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>SUBTOTAL</th>
										<th colspan="2" class="sub-total">
										@if($cart!=null)
										{{$cart->total_cost}}
										@endif
										</th>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>SHIPING</th>
										<td colspan="2" class="sub-total">
										@if($cart!=null)
										{{$cart->shipping_value}}
										@endif</td>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>TOTAL</th>
										<th colspan="2" class="total">
										@if($cart!=null)
										{{$cart->net_value}}
										@endif</th>
									</tr>
								</tfoot>
							</table>
							<div class="pull-right">
							
							<form  action="{{route('confirming')}}"  method="POST" >
									@csrf
									<input type="hidden" name="cartId" value="{{$cart->id}}"/>
								<button type="submit" class="primary-btn">Confirm Order</button>

									</form>
							</div>
						</div>

					</div>
			</div>
			<!-- /row -->