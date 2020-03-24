@extends('Admin.adminLayout.main')
@section('title', 'Home')


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
          <h6>Edit shop</h6>
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
          {{ Form::model($data, [ 'method'=> 'PUT', 'route'=> ['shop.update', $data->id] ]) }}
          <div class="ms-auth-container row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="exampleInputPassword1" for="exampleCheck1">Logo </label>
                            <div id="uploadLogo" class="img-upload">
                              <img src="{{ asset('uploads/homeshop/'.$data->logo)}}" alt="">
                              <div class="upload-icon">
                                {!! Form::file('logo', array('class'=>'upload') ) !!} 
                                <i class="fas fa-camera    "></i>
                              </div>
                            </div>
                          </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">Home Img </label>
                                <div id="uploadHome" class="img-upload">
                                  <img src="{{  asset('uploads/homeshop/'.$data->main_img)}}" alt="">
                                  <div class="upload-icon">
                                    {!! Form::file('main_img', array('class'=>'upload') ) !!} 
                                    <i class="fas fa-camera    "></i>
                                  </div>
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
                      <label class="exampleInputPassword1" for="exampleCheck1">Slogan </label>
                      {!! Form::text('slogan', null, array('class'=>'form-control') ) !!} 
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>default currency</label>
                    
                      {!! Form::select('default_curr', $currency,Null, ['class' => 'form-control'] ) !!}
  
                    </div>
                  </div>
                 
                  <div class="col-md-3">
                    <div class="form-group">
                      <div id="uploadOne" class="img-upload">
                        <img src="{{ asset('uploads/homeshop/'.$data->block1_image)}}" alt="">
                        <div class="upload-icon">
                          {!! Form::file('block1_image', array('class'=>'upload') ) !!} 
                          <i class="fas fa-camera    "></i>
                        </div>
                      </div>
                    </div>
                  </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <div id="uploadTwo" class="img-upload">
                        <img src="{{ asset('uploads/homeshop/'.$data->block2_image)}}" alt="">
                        <div class="upload-icon">
                          {!! Form::file('block2_image', array('class'=>'upload') ) !!} 
                          <i class="fas fa-camera    "></i>
                        </div>
                      </div>
                </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <div id="uploadThree" class="img-upload">
                          <img src="{{ asset('uploads/homeshop/'.$data->block3_image)}}" alt="">
                          <div class="upload-icon">
                            {!! Form::file('block3_image', array('class'=>'upload') ) !!} 
                            <i class="fas fa-camera    "></i>
                          </div>
                        </div>
                  </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div id="uploadFour" class="img-upload">
                          <img src="{{ asset('uploads/homeshop/'.$data->block4_image)}}" alt="">
                          <div class="upload-icon">
                            {!! Form::file('block4_image', array('class'=>'upload') ) !!} 
                            <i class="fas fa-camera    "></i>
                          </div>
                        </div>
                  </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="exampleInputPassword1" for="exampleCheck1">Block 1 text </label>
                      {!! Form::text('block1_text', null, array('class'=>'form-control') ) !!} 
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="exampleInputPassword1" for="exampleCheck1">Block 2 text </label>
                      {!! Form::text('block2_text', null, array('class'=>'form-control') ) !!} 
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="exampleInputPassword1" for="exampleCheck1">Block 3 text </label>
                      {!! Form::text('block3_text', null, array('class'=>'form-control') ) !!} 
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="exampleInputPassword1" for="exampleCheck1">Block 4 text </label>
                      {!! Form::text('block4_text', null, array('class'=>'form-control') ) !!} 
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <i class="fab fa-whatsapp"></i>
                      {!! Form::text('whatsapp_num', null, array('class'=>'form-control') ) !!} 
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <i class="fa fa-facebook "></i>
                      {!! Form::url('facebook_url', null, array('class'=>'form-control') ) !!} 
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <i class="fab fa-twitter"></i>
                      {!! Form::url('twitter_url', null, array('class'=>'form-control') ) !!} 
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <i class="fab fa-instagram"></i>
                      {!! Form::url('instgram_url', null, array('class'=>'form-control') ) !!} 
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example">Shop Description</label>
                      <div class="form-group">
  
                          {!! Form::textarea('description', $data->description, array('class'=>'content','id'=>'description') ) !!} 
  
                      </div>
                    </div>
                  </div>
  
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="example2"> Business Type</label>
                        <div class="form-group">
                          {!! Form::textarea('business_type', null, array('class'=>'content','id'=>'business_type') ) !!} 
                        </div>
                      </div>
                    </div>


                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example2"> Annual Revenue</label>
                        <div class="form-group">
                          {!! Form::textarea('total_revenue_annual', null, array('class'=>'content','id'=>'revenu') ) !!} 
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <i class="fas fa-map-marker-alt"></i>
                        {!! Form::text('location', null, array('class'=>'form-control','placeholder'=>'Map URL') ) !!} 

                      </div>
                    </div>


                    <div class="col-12">
                      <div class="custom-control custom-checkbox">
                      {{Form::hidden('active',0)}}
                        {!! Form::checkbox('active', 1,null, array('class'=>'') ) !!} 
                        
                        <label>Active</label> 
                      </div>
                    </div>
                  
               
              </div>
              <div class="input-group d-flex justify-content-end text-center">
                {{ Form::submit('Edit', array('class'=>'btn btn-success','id'=>'addshopsubmit') ) }}
  
                <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
                
              </div>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
        </div>
      </div>
    
     
  

</div>

</div>

 <!-- add category -->
  <?php
  function getParentCat($id)
  {
    

     $data=\App\Models\Category::select('en_name')->findOrFail($id);
     return $data->en_name;

  }
  ?>

 <div class="tabbable-panel">
  <div class="tabbable-line">
    <ul class="nav nav-tabs " role="tablist">

      <li  class="btn btn-light test">
        <a href="#tab_default_1" class="active" data-toggle="tab" role="tab">
Category </a>
      </li>
      <li class="btn btn-light " >
        <a href="#tab_default_2" data-toggle="tab" role="tab">
Slider </a>
      </li>
      <li class="btn btn-light " >
        <a href="#tab_default_3" data-toggle="tab" role="tab">
          Shop Reviews  </a>
      </li>
      <li class="btn btn-light " >
        <a href="#tab_default_4" data-toggle="tab" role="tab">
          Contacts Messages </a>
      </li>
      
    
    </ul>
    <div class="tab-content test ">
      <div class="tab-pane active" id="tab_default_1">
                      <!-- Add Category -->
                      <div class="row">
                          <div class="col-md-12">
                            <div class="ms-panel">
                              <div class="ms-panel-header d-flex justify-content-between">
                    <button class="btn btn-dark" data-toggle="modal" data-target="#addCat">Assign Category To Shop</button>
                  </div>
                  <div class="ms-panel-body">
          
                    <div class="table-responsive">
                      Shop category

                    </ul>
                      <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                          <tr>
                            <th scope="col">Category </th>
                            <th scope="col">Parent-Category</th>
                          
                            <th scope="col"></th>
          
                          </tr>
                        </thead>
                        <tbody>
                          
                            @foreach ($shop_categories as $shop_category)
                            <tr>
                               
                            <td >{{ $shop_category->en_name }}</td>
                            <td>{{getParentCat($shop_category->parent_category_id)}} </td> 
                              <td> 
                                <a href="#" onclick="detachCat('this Category', '{{$shop_category->id}}')" class="btn d-inline-block btn-danger">delete </a>

                                  <form id="delete_{{$shop_category->id}}" action="{{ route('shop_categoryDestroy', $shop_category->id) }}"  method="POST" style="display: none;">
                                  @csrf
                                 <input type="hidden" value={{$data->id}} name="shop_id">
                                  <button type="submit" value=""></button>
                                  </form>
                            </td>
                          </tr>  
                            @endforeach
                         
                          
                             
                             
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      <div class="tab-pane" id="tab_default_2">
                      <!-- Add service -->
                      <div class="row">
                          <div class="col-md-12">
                            <div class="ms-panel">
                              <div class="ms-panel-header d-flex justify-content-between">
                    <button class="btn btn-dark" data-toggle="modal" data-target="#addSlider"> new slider</button>
                  </div>
                  <div class="ms-panel-body">
          
                    <div class="table-responsive">
                      <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                          <tr>
                            <th scope="col">Img</th>
          
                            <th scope="col">Main Text</th>
                            <th scope="col">Active </th>
                            <th scope="col"></th>
          
                          </tr>
                        </thead>
                        <tbody>
                         @foreach($imageSliders as $image_slider)
                          imageSliders
                          <tr>
                          <td><img src="{{ asset('uploads/homeshop/'.$image_slider->image)}}" alt=""></td>
          
                          <td>{{$image_slider->main_text}}</td>
                          @if($image_slider->active==1)
                          <td><i class="fas fa-check" style="color: green;"></i></td>
                          @else
                          <td><i class="fas fa-check" style="color: red;"></i></td>
                          @endif
                            
          
                            <td>
                             
                              <a href="#" class="btn btn-info d-inline-block editslide" data-toggle="modal"
                                data-target="#editSlider" data-id="{{$image_slider->id}}" >edit</a>
                                <a href="#" onclick="detachCat('this Slider', '{{$image_slider->id}}')" class="btn d-inline-block btn-danger">delete </a>

                                  <form id="delete_{{$image_slider->id}}" action="{{ route('imageSliderDestroy', $image_slider->id) }}"  method="POST" style="display: none;">
                                  @csrf
                                  <button type="submit" value=""></button>
                                  </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </div>
<!-- Review -->
<div class="tab-pane" id="tab_default_3">
<h3 style="margin-bottom: 20px;color: green;border-bottom: 1px solid #CCC;"> Shop Reviews</h3>
<div class="col-md-12">
<div class="product-reviews" id='reviews'>

   @include('Admin.shopmanager.shop.reviews')

  
</div>
</div>
</div>
<!-- end Review -->
<!-- Message -->
<div class="tab-pane" id="tab_default_4">
<h3 style="margin-bottom: 20px;color: green;border-bottom: 1px solid #CCC;"> Contacts Messages</h3>
<div class="col-md-12">
<div class="product-reviews" id="contacts">

  @include('Admin.shopmanager.shop.contacts')

  

 
    

  
</div>
</div>
</div>

</div>
<!-- end Message -->


 
    </div>
  </div>
</div>



      <hr>

</div>
</div>
@include('Admin.shopmanager.shop.addCategory')
@include('Admin.shopmanager.shop.addslider')
<div class="modal fade" id="editSlider" tabindex="-1" role="dialog" aria-labelledby="editSlider">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X
       
      </button>
      <h3>Edit Slider Image</h3>
      <div class="modal-body" id="editslider">

      </div>

    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
  
    $(".editslide").on('click', function(){
      $id=$(this).attr("data-id") ;
      $.get("{{ URL::to('imageslider_update') }}/"+$id, function(data) {
            $("#editslider").html(data);
            
         });
        
   });
     

  });
    
    
     
  

  
   
   
  
 
  </script>

@endsection
