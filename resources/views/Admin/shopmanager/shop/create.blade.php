@section('modal')


<div class="modal fade" id="addShop" tabindex="-1" role="dialog" aria-labelledby="addShop">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X
       
      </button>
      <h3>Add Shop</h3>
    
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
        {{ Form::open(['route'=>'shop.store' , 'files' => true]) }}
              <div class="ms-auth-container row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="exampleInputPassword1" for="exampleCheck1">Logo </label>
                          <div id="uploadLogo" class="img-upload">
                            <img src="{{ asset('adminasset/img/eog-icon.png')}}" alt="">
                            <div class="upload-icon">
                              {!! Form::file('logo',  array('class'=>'upload') ) !!} 
                              <i class="fas fa-camera    "></i>
                            </div>
                          </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label class="exampleInputPassword1" for="exampleCheck1">Home Img </label>
                              <div id="uploadHome" class="img-upload">
                                <img src="{{ asset('adminasset/img/eog-icon.png')}}" alt="">
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
                      <img src="{{ asset('adminasset/img/category/Shopping-icon.png')}}" alt="">
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
                      <img src="{{ asset('adminasset/img/category/Shopping-icon.png')}}" alt="">
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
                        <img src="{{ asset('adminasset/img/category/Shopping-icon.png')}}" alt="">
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
                        <img src="{{ asset('adminasset/img/category/Shopping-icon.png')}}" alt="">
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
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example">Shop Description</label>
                    <div class="form-group">

                        {!! Form::textarea('description', null, array('class'=>'content','id'=>'description') ) !!} 

                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                      <label for="example2"> Business Type</label>
                      <div class="form-group">
                        {!! Form::textarea('business_type', null, array('class'=>'content','id'=>'business_type') ) !!} 
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="custom-control custom-checkbox">
                      {!! Form::checkbox('active', 1, array('class'=>'content') ) !!} 
                      Active</label> 
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

@endsection
