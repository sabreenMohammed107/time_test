<div class="tab-pane active" id="tab_default_2">
    <!-- Add img -->
    <div class="row">
        <div class="col-md-12">
          <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
  <button class=" btn btn-dark" data-toggle="modal" data-target="#addSlider"> new slider</button>
</div>
<div class="ms-panel-body">

  <div class="table-responsive">
    <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
      <thead>
        <tr>
          <th scope="col">Img</th>

          <th scope="col">Order</th>
          <th scope="col">Active</th>
          <th scope="col"></th>

        </tr>
      </thead>
      <tbody>
          @foreach($productSlider as $slider)
        <tr>
        <td><img src="{{asset('uploads/homeshop/'.$slider->image)}}" alt=""></td>

        <td>{{$slider->order}}</td>
          <td><i class="fas fa-check" style="color: green;"></i></td>

          <td>
            <a href="#" class="btn btn-info d-inline-block editimgslider" data-toggle="modal"
            data-target="#editSlider" data-id="{{$slider->id}}" >edit</a>
               
            <a href="#" onclick="deleteproduct('this Slider', '{{$slider->id}}')" class="btn d-inline-block btn-danger">delete </a>

                             
                <form id="deletepro_{{$slider->id}}" action="{{ route('productSlider_destroy', $slider->id) }}"  method="post" style="display: none;">
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


<!----- ---------------Add Slider ----------->


<div class="modal fade" id="addSlider" tabindex="-1" role="dialog" aria-labelledby="addSlider">
    <div class="modal-dialog modal-lg " role="document">
      <div class="modal-content">
        <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X
         
        </button>
        <h3>New Slider Image </h3>
        <div class="modal-body">

        
          <div class="ms-auth-container row no-gutters">
            <div class="col-12 p-3">
                {{ Form::open(['route'=> array('productSlider_store', $product->id) , 'files' => true]) }}

                                    
                <div class="ms-auth-container row">
                    <div class="col-md-6">
                        <div class="form-group">
                          
                            <div id="uploadHome" class="img-upload">
                                <img src="{{ asset('adminasset/img/eog-icon.png')}}" alt="">
                              <div class="upload-icon">
                                {!! Form::file('image',  array('class'=>'upload') ) !!} 
                                <i class="fas fa-camera    "></i>
                              </div>
                            </div>
                          </div>
                          </div>
                  
                 
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>order</label>
                      <div class="input-group">
                        {!! Form::number('order', null, array('class'=>'form-control') ) !!} 
                    </div>
                    </div>
                  </div>
                 
                  <div class="custom-control custom-checkbox">
                    {!! Form::checkbox('active', 1,null, array('class'=>'') ) !!} 
                   <label for="scales"> Active</label>
                 </div>


                </div>
                <div class="input-group d-flex justify-content-end text-center">
                    {{ Form::submit('Add', array('class'=>'btn btn-success','id'=>'addshopsubmit') ) }}

                    <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
                    
                  </div>
                  {!! Form::close() !!}
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>



  <!----- Edit Slider------>

  <div class="modal fade" id="editSlider" tabindex="-1" role="dialog" aria-labelledby="editSlider">
    <div class="modal-dialog modal-lg " role="document">
      <div class="modal-content">
        <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X
         
        </button>
        <h3>Edit Slider Image</h3>
        <div class="modal-body" id="editimageslider">
  
        </div>
  
      </div>
    </div>
  </div>

  <script>

$(document).ready(function(){
  
  $(".editimgslider").on('click', function(){
      
    $id=$(this).attr("data-id") ;
    
    $.get("{{ URL::to('productslider_update') }}/"+$id, function(data) {
          $("#editimageslider").html(data);
          
       });
      
 });
   

});
</script>