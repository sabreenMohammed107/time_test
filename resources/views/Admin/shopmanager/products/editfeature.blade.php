<div class="ms-auth-container row no-gutters">
    <div class="col-12 p-3">
      {{ Form::model($profeature,['route'=> array('productFeature_update', $profeature->id) ]) }}

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
          {{ Form::submit('Save', array('class'=>'btn btn-success','id'=>'addshopsubmit') ) }}

                  <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
                  
                </div>
                {!! Form::close() !!}
    </div>
  </div>