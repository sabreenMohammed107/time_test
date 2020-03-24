@extends('Customer.webLayout.mainShop')
@section('content')
											<div class="modal-dialog">
													<form>
														<div class="modal-header">
															<h4 class="modal-title">Edit Password</h4>
														</div>
														<div class="modal-body">
															<div class="form-group">
																<label>Old Password</label>
																<input type="password" class="form-control" value="{{$acount->password}}" required>
																<label>New Password</label>
																<input type="password" class="form-control" required>
																<label>Confirm Password</label>
																<input type="password" class="form-control" required>
															</div>
														</div>
														<div class="modal-footer">
															<input type="submit" class="btn btn-info" value="Save">
														</div>
													</form>
										</div> 


@endsection
@section('scripts')
@endsection