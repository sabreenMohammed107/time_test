

        
          <div class="ms-auth-container row no-gutters">
            <div class="col-12 p-3">
             
              {{ Form::model($slider, [ 'method'=> 'post', 'route'=> ['imagesSlider_update', $slider->id] , 'files' => true]) }}


                <div class="ms-auth-container row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div id="uploadHome" class="img-upload">
                                <img src="{{ asset('uploads/homeshop/'.$slider->image)}}" alt="">
                                <div class="upload-icon">
                                    {!! Form::file('image', array('class'=>'upload') ) !!} 
                                    <i class="fas fa-camera    "></i>
                              </div>
                            </div>
                          </div>
                          </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Main Text</label>
                      <div class="input-group">
                        {!! Form::text('main_text', null, array('class'=>'form-control') ) !!} 
                    </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Sub Text</label>
                      <div class="input-group">
                        {!! Form::text('sub_text', null, array('class'=>'form-control') ) !!} 
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
                    {{ Form::submit('Save', array('class'=>'btn btn-success','id'=>'addSlidersubmit') ) }}

                    <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
                    
                  </div>
                  {!! Form::close() !!}
            </div>
          </div>
        