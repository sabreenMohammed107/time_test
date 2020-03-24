<div class="tab-pane" id="tab_default_4">
    <!-- Add RELATED PRODUCTS  -->
    <div class="row">
    <div class="col-md-12">
    <div class="ms-panel">
      <div class="ms-panel-header d-flex justify-content-between">
    <button class="btn btn-dark" data-toggle="modal" data-target="#addRelated"> Add RELATED PRODUCTS </button>
    </div>
    <div class="ms-panel-body">
    
    <div class="table-responsive">
    <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
    <thead>
    <tr>
    <th scope="col">product name</th>
    
    <th scope="col">Active</th>
    <th scope="col"></th>
    
    </tr>
    </thead>
    <tbody>
        @foreach($relatedproduct as $rproduct)
        
      
        
    <tr>
    <td>{{$rproduct->product->en_name}}</td>
    @if($rproduct->product->active==1)
    <td><i class="fas fa-check" style="color: green;"></i></td>
    @else
    <td><i class="fas fa-check" style="color: red;"></i></td>
    @endif
    
    <td>
    
        <a href="#" onclick="deleteproduct('this Related Product', '{{$rproduct->id}}')" class="btn d-inline-block btn-danger">delete </a>

        <form id="deletepro_{{$rproduct->id}}" action="{{ route('relatedproducts_destroy', $rproduct->id) }}"  method="post" style="display: none;">
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
    <!--End RELATED PRODUCTS -->
    </div>

    <div class="modal fade" id="addRelated" tabindex="-1" role="dialog" aria-labelledby="addRelated">
        <div class="modal-dialog modal-lg " role="document">
          <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X
             
            </button>
            <h3>Related Product</h3>
            <div class="modal-body">
    
             
              <div class="ms-auth-container row no-gutters">
                <div class="col-12 p-3">
                   
    {{ Form::open(['route'=> array('relatedproducts_store', $product['id']) , 'files' => true]) }}
    
                    <div class="ms-auth-container row">
                       
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Product</label>
                                <div class="input-group">

                        {!! Form::select('related_product_id', $products,Null, ['class' => 'form-control','data-live-search'=>'true','data-show-subtext'=>'true'] ) !!}

                                  
                                </div>
                              </div>
                          </div>
                   
                    
                      <div class="col-md-12">
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