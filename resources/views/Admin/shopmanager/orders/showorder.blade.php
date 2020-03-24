@extends('Admin.adminLayout.main')
@section('title', 'Orders')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href=""><i class="material-icons"></i> Orders </a></li>
    </ol>
  </nav>

@endsection

@section('content')

<div class="row">

<div class="col-md-12">
 


    <div class="ms-panel">
        <div class="ms-panel-header d-flex justify-content-between">
          <h6>Shop Orders</h6>
        </div>

        <div class="ms-panel-body">
            <div class="ms-auth-container row no-gutters">
                <div class="col-12 p-3">
                    {{ Form::model($order, [ 'method'=> 'PUT', 'route'=> ['orders.update', $order->id ] ]) }}

                      <div class="ms-auth-container row">
                          <div class="col-md-4">
                              <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">Order Number</label>
                              <input type="number" class="form-control" value="{{$order->order_no}}" readonly>
                              </div>
                            </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">Created Date</label>
                                      <input type="text" class="form-control" value="{{$order->order_date}}" readonly>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                          <div class="form-group">
                                              <label>Order Status</label>
                                              <div class="input-group">
                                                <select name="order_status_id" class="form-control" id="">

                                                <option value="">select...</option>
                                                @foreach ($status as $status)
                                                <option value={{$status->id}} {{ ( $order->order_status_id == $status->id ) ? 'selected' : '' }}>{{ $status->status }}</option>
                                                @endforeach
                                                
                                                </select>
                                              </div>
                                            </div>
                                         
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">Client Name</label>
                                        <input type="text" class="form-control" value="{{$order->customer->name}}" readonly>
                                      </div>
                                    </div>
                                    <div class="col-md-6"></div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="exampleInputPassword1" for="exampleCheck1">Order Value</label>
                                    <input type="number" value="{{$order->order_value}}"  class="form-control" readonly>
                                  </div>
                                </div>
                             
                                <div class="col-md-4">
                                  <div class="form-group">
                                      <label class="exampleInputPassword1" for="exampleCheck1">Shipping Value</label>
                                      <input type="number"  class="form-control" value="{{$order->shipping_value}}" readonly>
                                  </div>
                                </div>
                               
                               
                               
                                <div class="col-md-4">
                                  <div class="form-group">
                                      <label class="exampleInputPassword1" >Vat Value </label>
                                    <input type="number" value="{{$order->vat_value}}" readonly class="form-control" >
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label class="exampleInputPassword1" >Net Value</label>
                                    <input type="number"  value="{{$order->net_value}}" readonly class="form-control" style="border:1px solid green" >
                                  </div>
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label class="exampleInputPassword1" >Delivary Date</label>
                                    <input type="text" value="{{$order->deleivery_date}}"  readonly class="form-control" >
                                  </div>
                                </div>

                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label >Client Notes</label>
                                    <div class="form-group">
                                        <textarea readonly class="form-control" >
                                            {{$order->client_note}}
                                        </textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="example">Shop Notes</label>
                                    <div class="form-group">
                                        <textarea class="content" name="shop_note" >

                                            {{$order->shop_note}}
                                        </textarea>
                                    </div>
                                  </div>
                                </div>
            
                                
                               
                                           
                        
                        
                      </div>
                      <div class="input-group d-flex justify-content-end text-center">
                        <input type="submit" value="Update" class="btn btn-success ">
                      </div>
                      </form>
                    </div>
                </div>
        
        
        
        
              </div>
        
            </div>


            <div class="tabbable-panel">
				<div class="tabbable-line">
					<ul class="nav nav-tabs " role="tablist">
   
						<li  class="btn btn-light test">
							<a href="#tab_default_1" class="active" data-toggle="tab" role="tab">
                              Order Items </a>
						</li>
						<li class="btn btn-light " >
							<a href="#tab_default_2" data-toggle="tab" role="tab">
                                Client Data </a>
            </li>
            <li class="btn btn-light " >
							<a href="#tab_default_3" data-toggle="tab" role="tab">
                                Shipping Data </a>
            </li>
            
          
					</ul>
            <div class="tab-content test ">
			    <div class="tab-pane active" id="tab_default_1">
                            <!-- Add Category -->
                     <div class="row">
                         <div class="col-md-12">
                            <div class="ms-panel">
                            <div class="ms-panel-header d-flex justify-content-between">
                         
                            </div>
                        <div class="ms-panel-body">
                
                          <div class="table-responsive">
                            <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Code</th>
                                  <th scope="col">Product Name</th>
                                  <th scope="col">Quantity</th>
                                  <th scope="col">Product Cost</th>
                                  <th scope="col">Total Line Cost </th>
                                  <th scope="col">Notes</th>
                                 
                
                                </tr>
                              </thead>
                              <tbody>
                                 @foreach( $order_items as $order_item)
                                <tr>
                                  <td>1</td>
                                  <td>{{$order_item->product->code}}</td>
                                  <td>{{$order_item->product->en_name}}</td>
                                  <td>{{$order_item->product_qty}}</td>
                                  <td>{{$order_item->product_cost}}</td>
                                  <td>{{$order_item->total_line_cost}}</td>
                                  <td>{{$order_item->note}}</td>
                
                
                                  
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--End Cat-->
							</div>
						<div class="tab-pane" id="tab_default_2">
                            <!-- Add img -->
                            <div class="row">
                                <div class="col-md-12">
                                  <div class="ms-panel">
                                    <div class="ms-panel-header d-flex justify-content-between">
                        
                        </div>
                        <div class="ms-panel-body">
                
                        
                            <form action="">
    
                                <div class="ms-auth-container row">
                                    
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Client Name</label>
                                      <div class="input-group">
                                      <input type="text"  class="form-control" value="{{$customer->name}}" readonly>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Email</label>
                                      <div class="input-group">
                                        <input type="email"  value="{{$customer->email}}" class="form-control" placeholder="Email" readonly>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Country</label>
                                      <div class="input-group">
                                        <input type="text" value="{{$customer->country->name}}" class="form-control" placeholder="Country" readonly>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label>City</label>
                                      <div class="input-group">
                                        <input type="text" value="{{$customer->city->name}}" class="form-control" placeholder="City" readonly>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Mobile 1</label>
                                      <div class="input-group">
                                        <input type="text" value="{{$customer->mobile1}}" class="form-control" placeholder="Mobile" readonly>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Mobile 2</label>
                                      <div class="input-group">
                                        <input type="text" value="{{$customer->mobile2}}"  class="form-control" placeholder="Mobile" readonly>
                                      </div>
                                    </div>
                                  </div>
                                  
                                 
                                  
                
                
                                </div>
                              
                              </form>
                           
                        
                        </div>
                      </div>
                    </div>
                  </div>
						</div>
						

            <div class="tab-pane" id="tab_default_3">
        <!-- Add FEATURES  -->
        <div class="row">
            <div class="col-md-12">
              <div class="ms-panel">
                <div class="ms-panel-header d-flex justify-content-between">
    
    </div>
    <div class="ms-panel-body">
                
                        
        <form action="">

            <div class="ms-auth-container row">
                
              <div class="col-md-6">
                <div class="form-group">
                  <label>Client Name</label>
                  <div class="input-group">
                    <input type="text"  class="form-control" placeholder="{{$shiping->name}}" readonly>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Addrees</label>
                  <div class="input-group">
                    <input type="text"  value="{{$shiping->street_address}}" class="form-control" placeholder="Address" readonly>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Country</label>
                  <div class="input-group">
                    <input type="text" value="{{$shiping->country->name}}" class="form-control" placeholder="Country" readonly>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>City</label>
                  <div class="input-group">
                    <input type="text" value="{{$shiping->city->name}}" class="form-control" placeholder="City" readonly>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Mobile 1</label>
                  <div class="input-group">
                    <input type="text" value="{{$shiping->mobile1}}" class="form-control" placeholder="Mobile" readonly>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Mobile 2</label>
                  <div class="input-group">
                    <input type="text" value="{{$shiping->mobile2}}"  class="form-control" placeholder="Mobile" readonly>
                  </div>
                </div>
              </div>
             
              <div class="col-md-6">
                <div class="form-group">
                  <label>Postal Code</label>
                  <div class="input-group">
                    <input type="text" value="{{$shiping->postal_code}}"  class="form-control" placeholder="Postal" readonly>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Address Marks </label>
                  <div class="input-group">
                    <input type="text" value="{{$shiping->address_feature}}"  class="form-control" placeholder="Marks" readonly>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Map Location</label>
                  <div class="input-group">
                    <input type="text" value="{{$shiping->map_location}}"  class="form-control" placeholder="Map" readonly>
                  </div>
                </div>
              </div>


            </div>
          
          </form>
       
    
    </div>
  </div>
</div>
</div>
<!--End FEATURES -->
  </div>
  

       </div>
   

       
					</div>
				</div>
			</div>



            <hr>
     
</div>
</div>

@endsection