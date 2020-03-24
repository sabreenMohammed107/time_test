<div class="tab-pane" id="tab_default_3">
  <!-- Add FEATURES  -->
  <div class="row">
      <div class="col-md-12">
        <div class="ms-panel">
          <div class="ms-panel-header d-flex justify-content-between">
<button class="btn btn-dark" data-toggle="modal" data-target="#addfeatures"> Add FEATURES </button>
</div>
<div class="ms-panel-body">

<div class="table-responsive">
  <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
    <thead>
      <tr>
        <th scope="col">Feature Name</th>
        <th scope="col">Feature Text</th>
        <th scope="col">Active</th>
        <th scope="col"></th>

      </tr>
    </thead>
    <tbody>
      @foreach($productFeatures as $feature)
      @if(is_null($feature->feature))
      @else
      <tr>
        <td>{{$feature->feature->feature_text}}</td>
        <td>{{$feature->value}}</td>
        @if($feature->active==1)
        <td><i class="fas fa-check" style="color: green;"></i></td>
        @else
        <td><i class="fas fa-check" style="color: red;"></i></td>
        @endif
        <td>
       
          <a href="#" class="btn btn-info d-inline-block editproslider" data-toggle="modal"
          data-target="#editfeature" data-id="{{$feature->id}}" >edit</a>
            <a href="#" onclick="deleteproduct('this Feature', '{{$feature->id}}')" class="btn d-inline-block btn-danger">delete </a>

                             
            <form id="deletepro_{{$feature->id}}" action="{{ route('productFeature_destroy', $feature->id) }}"  method="post" style="display: none;">
                            @csrf
                            
                            <button type="submit" value=""></button>
                            
            </form>        </td>
      </tr>
      @endif
      @endforeach
    </tbody>
  </table>
</div>
</div>
</div>
</div>
</div>
<!--End FEATURES -->
</div>


 <!--  Feature  Modal -->
 <div class="modal fade" id="addfeatures" tabindex="-1" role="dialog" aria-labelledby="addfeatures">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X
           
      </button>
      <h3>New Feature  </h3>
      <div class="modal-body">

       
        <div class="ms-auth-container row no-gutters">
          <div class="col-12 p-3">
            {{ Form::open(['route'=> array('productFeature_store', $product->id) ]) }}

              <div class="ms-auth-container row">
                 
                  <!-- <div class="col-md-12">
                      <div class="form-group">
                        <label>Feature Name</label>
                        <div class="input-group">
                          <input type="text" id="newServiceText" class="form-control" placeholder="Feature Name">
                        </div>
                      </div>
                    </div> -->
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Feature Name</label>
                        <div class="input-group">
                          {!! Form::select('feature_id', $features,Null, ['class' => 'form-control','data-live-search'=>'true','data-show-subtext'=>'true'] ) !!}

                        
                        </div>
                      </div>
                    </div>
              
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Feature Text</label>
                    <div class="input-group">
                      {!! Form::text('value', null, array('class'=>'form-control') ) !!} 
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                <div class="custom-control custom-checkbox">
                  {!! Form::checkbox('active', 1,null, array('class'=>'') ) !!} 
                  <label for="scales"> Active</label>
         </div>
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


<!--  Edit Feature  Modal -->
<div class="modal fade" id="editfeature" tabindex="-1" role="dialog" aria-labelledby="editfeature">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X
           
      </button>
      <h3>Edit Feature  </h3>
      <div class="modal-body " id="feature">

       
        
      </div>

    </div>
  </div>
</div>
<script>

  $(document).ready(function(){
    
    $(".editproslider").on('click', function(){
        
      $id=$(this).attr("data-id") ;
      
      $.get("{{ URL::to('productfeature_update') }}/"+$id, function(data) {
            $("#feature").html(data);
            
         });
        
   });
     
  
  });
  </script>