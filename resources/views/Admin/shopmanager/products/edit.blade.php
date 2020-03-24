@extends('Admin.adminLayout.main')
@section('title', 'Edit Products')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href=""><i class="material-icons"></i> home </a></li>
    </ol>
  </nav>

@endsection

@section('content')

<div class="row">

<div class="col-md-12">
 


    <div class="ms-panel">
        <div class="ms-panel-header d-flex justify-content-between">
          <h6>Edit Product</h6>
        </div>
        <div class="ms-panel-body">
          
          <div class="ms-auth-container row no-gutters">
            <div class="col-12 p-3">
              @if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          @endif
         
          {{ Form::model($product, [ 'method'=> 'PUT', 'route'=> ['products.update', $product['id'] ] ]) }}
          <div class="ms-auth-container row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="exampleInputPassword1" for="exampleCheck1">Image </label>
                            <div id="uploadLogo" class="img-upload">
                              <img src="{{ asset('uploads/homeshop/'.$product['main_image'])}}" alt="">
                              <div class="upload-icon">
                                {!! Form::file('main_image', array('class'=>'upload') ) !!} 
                                <i class="fas fa-camera    "></i>
                              </div>
                            </div>
                          </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="exampleInputPassword1" for="exampleCheck1">Code</label>
                              {!! Form::text('code', null, array('class'=>'form-control') ) !!} 
                            </div>
                          </div>

                          <div class="col-md-3">
                            <label class="exampleInputPassword1" for="exampleCheck1">Rate</label>
                            <div class="form-group">
                            <div class="review-rating pull-left">

                              @foreach(range(1,5) as $i)
									                  
									             	@if(($product->total_stars_rate) >=$i )
									               	<i class="fa fa-star"></i>
                          @else
									          	<i class="fa fa-star-o empty"></i>
									         	@endif
											
									   
										@endforeach
                            	</div>   
                            </div>
                          </div>
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="exampleInputPassword1" for="exampleCheck1">En-Name</label>
                              {!! Form::text('en_name', null, array('class'=>'form-control') ) !!} 
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="exampleInputPassword1" for="exampleCheck1">Ar-Name</label>
                              {!! Form::text('ar_name', null, array('class'=>'form-control') ) !!} 
                            </div>
                          </div>
                
            
             
              <div class="col-md-6">
                <div class="form-group">
                  <label class="exampleInputPassword1" for="exampleCheck1">Category </label>
                  <select name="category_id" class="form-control" id="category">
                    <option value="">select...</option>
                    @foreach ($shop_categories as $category)
                    <option value={{$category->id}} {{ ( $category->id == $product->category_id ) ? 'selected' : '' }}>{{ $category->en_name }}</option>
                    @endforeach
                  </select>                  </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-group">
                  <label class="exampleInputPassword1" for="exampleCheck1">Brand </label>
                  {!! Form::select('brand_id', $brands,Null, ['class' => 'form-control'] ) !!}
                </div>
              </div>
             
              <div class="col-md-6">
                <div class="form-group">
                  <label class="exampleInputPassword1" for="exampleCheck1">Gender </label>
                  {!! Form::select('gender_id', $gender,Null, ['class' => 'form-control'] ) !!}
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label class="exampleInputPassword1" for="exampleCheck1">Sales Measure Unit  </label>
                  {!! Form::select('unitmeasur_id', $unit_measure,Null, ['class' => 'form-control'] ) !!}
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="exampleInputPassword1" for="exampleCheck1">Sales Measure Unit  </label>
                  {!! Form::text('qty_per_unit', null, array('class'=>'form-control') ) !!} 

                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label class="exampleInputPassword1" for="exampleCheck1">Quantity Per Unit </label>
                  {!! Form::number('qty_in_stock', null, array('class'=>'form-control') ) !!} 

                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label class="exampleInputPassword1" for="exampleCheck1">Unit Description </label>
                  {!! Form::text('unit_desc', null, array('class'=>'form-control') ) !!} 

                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label class="exampleInputPassword1" for="exampleCheck1">Product Price </label>
                  {!! Form::number('price', null, array('class'=>'form-control','id'=>'price') ) !!} 

                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label class="exampleInputPassword1" for="exampleCheck1">discount  Price % </label>
                  {!! Form::number('discount_perc', null, array('class'=>'form-control','id'=>'discount') ) !!} 

                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="exampleInputPassword1" for="exampleCheck1">Price After </label>
                  {!! Form::text('price_after', null, array('class'=>'form-control','readonly' => 'true','id'=>'price_after') ) !!} 

                </div>
              </div>

              

              <div class="col-md-12">
                <div class="form-group">
                  <label for="example2"> En_Description</label>
                  <div class="form-group">
                    {!! Form::textarea('en_description', null, array('class'=>'content','id'=>'en_description') ) !!} 
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label for="example2"> Ar_Description</label>
                  <div class="form-group">
                    {!! Form::textarea('ar_description', null, array('class'=>'content','id'=>'en_description') ) !!} 
                  </div>
                </div>
              </div>

              <div class="col-6">
                <div class="custom-control custom-checkbox">
                  {!! Form::checkbox('new_flag', 1,null, array('class'=>'') ) !!} 
                  <label>New Product</label> 
                </div>
              </div>

              <div class="col-6">
                <div class="custom-control custom-checkbox">
                  {!! Form::checkbox('upcoming_flag', 1,null, array('class'=>'') ) !!} 
                  <label>upcoming Product</label> 
                </div>
              </div>

              <div class="col-12">
                <div class="custom-control custom-checkbox">
                  {!! Form::checkbox('active', 1,null, array('class'=>'') ) !!} 
                  <label>Active</label> 
                </div>
              </div>
          <div class="input-group d-flex justify-content-end text-center">
            {{ Form::submit('Save', array('class'=>'btn btn-success','id'=>'addshopsubmit') ) }}

            
          </div>
          {!! Form::close() !!}
            </div>
          </div>
        </div>
        </div>
      </div>
    
     
  

</div>

</div>



<!-- -------------tabs ---------------->



<div class="tabbable-panel">
  <div class="tabbable-line">
    <ul class="nav nav-tabs " role="tablist">

      
      <li class="btn btn-light " >
        <a href="#tab_default_2" data-toggle="tab" role="tab">
                          Image Slider </a>
      </li>
      <li class="btn btn-light " >
        <a href="#tab_default_3" data-toggle="tab" role="tab">
                          Product Features  </a>
      </li>
      <li class="btn btn-light " >
        <a href="#tab_default_4" data-toggle="tab" role="tab">
                          RELATED PRODUCTS </a>
      </li>
     

                  <li class="btn btn-light " >
        <a href="#tab_default_6" data-toggle="tab" role="tab">
                          reviews  </a>
      </li>
    
    </ul>
    <div class="tab-content test ">
     
    @include('Admin.shopmanager.products.addSlider')

 @include('Admin.shopmanager.products.productFeatures')

@include('Admin.shopmanager.products.relatedProducts')


<!-- order -->
<div class="tab-pane" id="tab_default_5">
<!-- Add OFFERS     -->
<div class="row">
<div class="col-md-12">
<div class="ms-panel">
  <div class="ms-panel-header d-flex justify-content-between">
<button class="btn btn-dark" data-toggle="modal" data-target="#addOffer"> Add OFFERS    </button>
</div>
<div class="ms-panel-body">

<div class="table-responsive">
<table id="courseEval" class="dattable table table-striped thead-dark  w-100">
<thead>
<tr>
<th scope="col">Offer text</th>
<th scope="col">Offer order </th>
<th scope="col">Off quantity</th>
<th scope="col">Discount Percentage %</th>

<th scope="col"></th>

</tr>
</thead>
<tbody>
<tr>
<td>100 EGP off per 1000 qty</td>
<td>20</td>
<td>100</td>
<td>12</td>



<td>

  <a href="#" class="btn btn-info d-inline-block" data-toggle="modal"
    data-target="#addOffer">edit</a>
  <a href="#" onclick="delette('this Offer ');" class="btn d-inline-block btn-danger">delete</a>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div></div>
<!--End RELATED PRODUCTS -->
<!-- Review -->
<div class="tab-pane" id="tab_default_6">
<h3 style="margin-bottom: 20px;color: green;border-bottom: 1px solid #CCC;"> Product Reviews</h3>
<div class="col-md-12">
<div class="product-reviews" id="reviews">

  

  @include('Admin.shopmanager.products.reviews')

    
  

  
</div>
</div>
</div>
<!-- end Review -->
 </div>


 
    </div>
  </div>
</div>



      <hr>

</div>
</div>



<script>

  $(document).on("change keyup blur", "#discount", function() {
    var price = $('#price').val();
    var discount = $('#discount').val();
    if (discount != '' && price != '') {

      discounted_price = price - (price * discount / 100)
      $('#price_after').val( discounted_price);
    }
    
    else{
      $('#price_after').val(parseInt(price));
    }
  });
  
  </script>
 
@endsection
