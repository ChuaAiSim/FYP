	@extends('layouts.naviBar')
	@section('content')
<script>
	
console.log("<?=Auth::user()->address2?>");
</script>
	<div style="font-weight: bold;margin-top: 75px;margin-left: 55px;font-size: 30px; text-align: center">Profile</div>
		<div class="container-fluid" style="margin-top: 50px;background-color: white;">
			 <div class="row">
        		<div class="col-sm-5" style="margin-left: 550px;margin-bottom:50px;margin-right: 150px;padding:20px; background-color: #cecbcb;height: 550px;width: 40%">
        			@guest
        				    <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register')}}">Register</a></li>

                     @else       
					    	<form action="{{ route('updateProfile',['id' => $customer->id]) }}" method="post" enctype="multipart/form-data">
						    		<div class="row" style="padding-top: 20px">
										    <div class="form-group col-md-6">
										    	<label for="inputFirstName">First Name</label>
										      	<input name="firstname" type="text" class="form-control" value="<?=Auth::user()->firstname?>" readonly>
										    </div>
										    <div class="form-group col-md-6">
										    	<label for="inputLastName">Last Name</label>
										      <input name="lastname" type="text" class="form-control"  value="<?=Auth::user()->lastname?>" readonly>
										    </div>
				        			</div>


									  <div class="form-row">
									  	 <div class="form-group">
										    <label for="inputAddress">Address</label>
										    <input type="text" name="address1" class="form-control" id="inputAddress" value="<?=Auth::user()->address1?>">
										  </div>
										  <div class="form-group">
										    <label for="inputAddress2">Address 2</label>
										    <input type="text" name="address2" class="form-control" id="inputAddress2" value="<?=Auth::user()->address2?>">
										  </div>
									  </div>

									  <div class="row">
									    <div class="form-group col-md-4">
									      <label for="inputCity">City</label>
									      <input type="text" class="form-control" id="inputCity" name="city" value="<?=Auth::user()->city?>">
									    </div>
									    <div class="form-group col-md-5">
									      <label for="inputState">State</label>
									      <select name="state" id="inputState" class="form-control">
											<option value="Selangor" <?= Auth::user()->state == "Selangor"?"selected":"" ?>>Selangor</option>
									        <option value="Negeri Sembilan" <?= Auth::user()->state == "Negeri Sembilan"?"selected":"" ?>>Negeri Sembilan</option>
									        <option value="Melaka" <?= Auth::user()->state == "Melaka"?"selected":"" ?>>Melaka</option>
									        <option value="Pulau Pinang" <?= Auth::user()->state == "Pulau Pinang"?"selected":"" ?>>Pulau Pinang</option>
									        <option value="Johor" <?= Auth::user()->state == "Johor"?"selected":"" ?>>Johor</option>
									        <option value="Perak" <?= Auth::user()->state == "Perak"?"selected":"" ?>>Perak</option>
									        <option value="Perlis" <?= Auth::user()->state == "Perlis"?"selected":"" ?>>Perlis</option>
									        <option value="Kedah" <?= Auth::user()->state == "Kedah"?"selected":"" ?>>Kedah</option>
									        <option value="Kelantan" <?= Auth::user()->state == "Kelantan"?"selected":"" ?>>Kelantan</option>
									        <option value="Sabah" <?= Auth::user()->state == "Sabah"?"selected":"" ?>>Sabah</option>
									        <option value="Sarawak" <?= Auth::user()->state == "Sarawak"?"selected":"" ?>>Sarawak</option>
									        <option value="Kuala Lumpur" <?= Auth::user()->state == "Kuala Lumpur"?"selected":"" ?>>Kuala Lumpur</option>
									        <option value="Putrajaya" <?= Auth::user()->state == "Putrajaya"?"selected":"" ?>>Putrajaya</option>
										</select>	 

									    </div>
									    <div class="form-group col-md-3">
									      <label for="inputPostcode">Postcode</label>
									      <input name="postcode" type="text" class="form-control" id="inputPostcode" value="<?= Auth::user()->postcode?>"/>
									    </div>
									  </div>

									  <div class="form-group form-row">
									  	<div class="form-group col-md-12">
										  	<label for="inputPhone">Phone</label>
										     <input name="phone" type="text" class="form-control col-md-9" id="phone" value="<?= Auth::user()->phone?>" required/>
										 </div>
									  </div>

									{{csrf_field()}}
									  <div class="form-group form-row" style="margin-top:20px;text-align: center;">
									  	<button type="submit" class="btn btn-success">Update Profile</button>
									  </div>

				        		</form>
				        		@endguest
				        	</div>
			        </div>
        		</div>
        	</div>
	@endsection