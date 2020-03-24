<div class="row">
										<div class="col-md-12">
											<div class="table-wrapper">
												<div class="table-title">
													<div class="row">
														<div class="col-sm-6">
															<h2>Manage <b>Account</b></h2>
														</div>
														<div class="col-sm-6">
														</div>
													</div>
												</div>
       <form method="POST" id="updatAccount"  >

       <input type="hidden" value="{{csrf_token()}}" id="tokenAccount"/>
		<input type="hidden" id="account_id" name="account_id" value="{{$acount->id}}" >
 
    <div class="form-group row">
        <label  class="col-md-2 col-form-label">{{ __('Name') }}</label>
        <div class="col-md-7">
            <input id="name" name="name" type="text" value="{{$acount->name}}" class="form-control" required autofocus>
        </div>
    </div>
    <!-- <div class="form-group row">
        <label for="new_password" class="col-md-2 col-form-label">{{ __('New password') }}</label>
        <div class="col-md-7">
            <input id="new_password" name="new_password" type="password" class="form-control" >
        </div>
    </div> -->
    <!-- <div class="form-group row">
        <label for="password_confirm" class="col-md-2 col-form-label">{{ __('Confirm password') }}</label>

        <div class="col-md-7">
            <input id="password_confirm" name="password_confirm" type="password" class="form-control" >
        </div>
    </div> -->

    <div class="form-group row">
        <label for="old_password" class="col-md-2 col-form-label">{{ __('Email') }}</label>
        <div class="col-md-7">
            <input id="email" name="email" type="email" value="{{$acount->email}}" class="form-control" required autofocus>
        </div>
    </div>

    <div class="form-group row">
        <label for="old_password" class="col-md-2 col-form-label">{{ __('Phone') }}</label>
        <div class="col-md-7">
            <input id="phone" name="phone" type="text" value="{{$acount->mobile1}}" class="form-control" required autofocus>
        </div>
    </div>


    <div class="form-group row">
        <label for="old_password" class="col-md-2 col-form-label">{{ __('Job Title') }}</label>
        <div class="col-md-7">
            <input id="job" name="job" type="text" value="{{$acount->job_title}}" class="form-control" required autofocus>
        </div>
    </div>


    <div class="form-group row">
        <label for="old_password" class="col-md-2 col-form-label">{{ __('Company') }}</label>
        <div class="col-md-7">
            <input id="company" name="company" type="text" value="{{$acount->company}}" class="form-control" required autofocus>
        </div>
    </div>


    <div class="form-group row">
        <label for="old_password" class="col-md-2 col-form-label">{{ __('Gender') }}</label>
        <div class="col-md-7">
            <input id="gender" name="gender" type="text" value="{{$acount->gender}}" class="form-control" required autofocus>
        </div>
    </div>


    <div class="form-group row">
        <label for="old_password" class="col-md-2 col-form-label">{{ __('Postal Code') }}</label>
        <div class="col-md-7">
            <input id="postal" name="postal" type="text" value="{{$acount->postal_code}}" class="form-control" required autofocus>
        </div>
    </div>


    <div class="form-group login-row row mb-0">
        <div class="col-md-9 offset-md-7">
            <button type="submit" class="btn btn-primary">
                {{ __('Update') }}
            </button>
        </div>
    </div>
</form>
														
													

											</div>
										</div>

										<!-- Edit Modal HTML -->
										<div id="editEmployeeModa1" class="modal fade">
											<div class="modal-dialog">
												<div class="modal-content">
													<form>
														<div class="modal-header">
															<h4 class="modal-title">Edit Account Data</h4>
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														</div>
														<div class="modal-body">
															<div class="form-group">
																<label>Update Name</label>
																<input type="text" class="form-control" required>
															</div>
														</div>
														<div class="modal-footer">
															<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
															<input type="submit" class="btn btn-info" value="Save">
														</div>
													</form>
												</div>
											</div>
										</div>
										<div id="editEmployeeModa2" class="modal fade">
											<div class="modal-dialog">
												<div class="modal-content">
													<form>
														<div class="modal-header">
															<h4 class="modal-title">Edit Account Data</h4>
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														</div>
														<div class="modal-body">
															<div class="form-group">
																<label>Old Password</label>
																<input type="text" class="form-control" required>
																<label>New Password</label>
																<input type="text" class="form-control" required>
																<label>Confirm Password</label>
																<input type="text" class="form-control" required>
															</div>
														</div>
														<div class="modal-footer">
															<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
															<input type="submit" class="btn btn-info" value="Save">
														</div>
													</form>
												</div>
											</div>
										</div>
										<div id="editEmployeeModa3" class="modal fade">
											<div class="modal-dialog">
												<div class="modal-content">
													<form>
														<div class="modal-header">
															<h4 class="modal-title">Edit Account Data</h4>
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														</div>
														<div class="modal-body">
															<div class="form-group">
																<label>Update Email</label>
																<input type="text" class="form-control" required>
															</div>
														</div>
														<div class="modal-footer">
															<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
															<input type="submit" class="btn btn-info" value="Save">
														</div>
													</form>
												</div>
											</div>
										</div>
										<div id="editEmployeeModa4" class="modal fade">
											<div class="modal-dialog">
												<div class="modal-content">
													<form>
														<div class="modal-header">
															<h4 class="modal-title">Edit Account Data</h4>
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														</div>
														<div class="modal-body">
															<div class="form-group">
																<label>Update Address</label>
																<input type="text" class="form-control" required>
															</div>
														</div>
														<div class="modal-footer">
															<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
															<input type="submit" class="btn btn-info" value="Save">
														</div>
													</form>
												</div>
											</div>
										</div>
										<div id="editEmployeeModa5" class="modal fade">
											<div class="modal-dialog">
												<div class="modal-content">
													<form>
														<div class="modal-header">
															<h4 class="modal-title">Edit Account Data</h4>
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														</div>
														<div class="modal-body">
															<div class="form-group">
																<label>Update Phone</label>
																<input type="text" class="form-control" required>
															</div>
														</div>
														<div class="modal-footer">
															<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
															<input type="submit" class="btn btn-info" value="Save">
														</div>
													</form>
												</div>
											</div>
										</div>
										<div id="editEmployeeModa6" class="modal fade">
											<div class="modal-dialog">
												<div class="modal-content">
													<form>
														<div class="modal-header">
															<h4 class="modal-title">Edit Account Data</h4>
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														</div>
														<div class="modal-body">
															<div class="form-group">
																<label>Update Job Title</label>
																<input type="text" class="form-control" required>
															</div>
														</div>
														<div class="modal-footer">
															<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
															<input type="submit" class="btn btn-info" value="Save">
														</div>
													</form>
												</div>
											</div>
										</div>
										<div id="editEmployeeModa7" class="modal fade">
											<div class="modal-dialog">
												<div class="modal-content">
													<form>
														<div class="modal-header">
															<h4 class="modal-title">Edit Account Data</h4>
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														</div>
														<div class="modal-body">
															<div class="form-group">
																<label>Update Company</label>
																<input type="text" class="form-control" required>
															</div>
														</div>
														<div class="modal-footer">
															<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
															<input type="submit" class="btn btn-info" value="Save">
														</div>
													</form>
												</div>
											</div>
										</div>
										<div id="editEmployeeModa8" class="modal fade">
											<div class="modal-dialog">
												<div class="modal-content">
													<form>
														<div class="modal-header">
															<h4 class="modal-title">Edit Account Data</h4>
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														</div>
														<div class="modal-body">
															<div class="form-group">
																<label>Update Gender</label>
																<input type="text" class="form-control" required>
															</div>
														</div>
														<div class="modal-footer">
															<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
															<input type="submit" class="btn btn-info" value="Save">
														</div>
													</form>
												</div>
											</div>
										</div>
										<div id="editEmployeeModa9" class="modal fade">
											<div class="modal-dialog">
												<div class="modal-content">
													<form>
														<div class="modal-header">
															<h4 class="modal-title">Edit Account Data</h4>
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														</div>
														<div class="modal-body">
															<div class="form-group">
																<label>Update Postal Code</label>
																<input type="text" class="form-control" required>
															</div>
														</div>
														<div class="modal-footer">
															<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
															<input type="submit" class="btn btn-info" value="Save">
														</div>
													</form>
												</div>
											</div>
										</div>

										<!-- Delete Modal HTML -->
										<div id="deleteEmployeeModal" class="modal fade">
											<div class="modal-dialog">
												<div class="modal-content">
													<form>
														<div class="modal-header">
															<h4 class="modal-title">Delete Account</h4>
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														</div>
														<div class="modal-body">
															<p>Are you sure you want to delete these Records?</p>
															<p class="text-warning"><small>This action cannot be undone.</small></p>
														</div>
														<div class="modal-footer">
															<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
															<input type="submit" class="btn btn-danger" value="Delete">
														</div>
													</form>
												</div>
											</div>
										</div>

									</div>