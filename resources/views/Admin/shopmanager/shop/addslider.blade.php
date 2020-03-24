<div class="modal fade" id="addSlider" tabindex="-1" role="dialog" aria-labelledby="addSlider">
    <div class="modal-dialog modal-lg " role="document">
      <div class="modal-content">
        <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X
         
        </button>
        <h3>New Slider Image</h3>
        <div class="modal-body">

        
          <div class="ms-auth-container row no-gutters">
            <div class="col-12 p-3">
                {{ Form::open(['route'=> array('imagesSlider_store', $data->id) , 'files' => true]) }}

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
                    {!! Form::checkbox('active', 1, array('class'=>'scales') ) !!} 

             <label for="scales"> Active</label>
           </div>


                </div>
                <div class="input-group d-flex justify-content-end text-center">
                    {{ Form::submit('Add', array('class'=>'btn btn-success','id'=>'addSlidersubmit') ) }}

                    <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
                    
                  </div>
                  {!! Form::close() !!}
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>