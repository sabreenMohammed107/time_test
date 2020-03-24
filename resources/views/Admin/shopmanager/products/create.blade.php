@section('modal')


<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="addProduct">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X
       
      </button>
      <h3>Add product</h3>
    
      <div class="modal-body">

       
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
        {{ Form::open(['route'=>'products.store' , 'files' => true]) }}
              <div class="ms-auth-container row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="exampleInputPassword1" for="exampleCheck1">Main image </label>
                          <div id="uploadLogo" class="img-upload">
                            <img src="{{ asset('adminasset/img/eog-icon.png')}}" alt="">
                            <div class="upload-icon">
                              {!! Form::file('main_image',  array('class'=>'upload') ) !!} 
                              <i class="fas fa-camera    "></i>
                            </div>
                          </div>
                        </div>
                        </div>
                        
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">Code</label>
                                {!! Form::text('code', null, array('class'=>'form-control') ) !!} 
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
                      <option value={{$category->id}} >{{ $category->en_name }}</option>
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

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="exampleInputPassword1" for="exampleCheck1">Unit Description </label>
                    {!! Form::text('unit_desc', null, array('class'=>'form-control') ) !!} 

                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="exampleInputPassword1" for="exampleCheck1">Product Price </label>
                    {!! Form::number('price', null, array('class'=>'form-control') ) !!} 

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

@endsection
