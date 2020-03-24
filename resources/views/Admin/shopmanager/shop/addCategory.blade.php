 <!--  category Modal -->
 <div class="modal fade" id="addCat" tabindex="-1" role="dialog" aria-labelledby="addCat">
    <div class="modal-dialog modal-lg " role="document">
      <div class="modal-content">
        <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X
             
        </button>
        <h3>Assign Category to shop</h3>
        <div class="modal-body">

          
          <div class="ms-auth-container row no-gutters">
            <div class="col-12 p-3">
             
        {{ Form::open(['route'=>'shop_categories' ]) }}
                <div class="ms-auth-container row">
                    
                  
                  {{ Form::hidden('shop_id', $data->id ) }}
                 
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Parent Category</label>
                      <div class="input-group">
                        <select name="Category" class="form-control" id="category">
                          <option value="">select...</option>
                          @foreach ($categories as $category)
                          <option value={{$category->id}} >{{ $category->en_name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Sub Category</label>
                      <div class="input-group">
                        <select name="category_id" class="form-control" id="subcategory">
                          <option value="">select...</option>
                          
                        </select>
                      </div>
                    </div>
                  </div>
                 
                  


                </div>
                <div class="input-group d-flex justify-content-end text-center">
                  <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
                  {{ Form::submit('Add', array('class'=>'btn btn-success','id'=>'addshopsubmit') ) }}
                </div>

                
              
              {!! Form::close() !!}
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- /category Modal -->
  <script>
    $(document).ready(function(){
    
     $('#category').change(function(){
      $('#subcategory').val('');
      if($(this).val() != '')
      {
       var select = $(this).attr("id");
       var value = $(this).val();
      // var dependent = $(this).data('dependent');
       var _token = $('input[name="_token"]').val();
      
      
       $.get("{{ URL::to('subcategories') }}/"+value, function(data) {
              $("#subcategory").html(data);
              
           });
          }
     });
    
  
    
     
     
    
    });
    </script>
    