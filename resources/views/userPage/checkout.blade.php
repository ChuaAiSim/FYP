	@extends('layouts.naviBar')
	@section('content')
<script>
	var type = 0;
	var click = false;

	function validateButton(){
		if(!click)
		{	
			document.getElementById('confirmAlert').style.visibility = "visible";
			return false;	
		}
		else
		{
			document.getElementById('confirmAlert').style.visibility = "hidden";
			return true;
		}
	}
	function addFees(){
		type = 0;
	}

	function removeFee(){
		type = 1;
	}

	function confirm(){
		document.getElementById('confirmShipping').disabled = true;
		var amount = document.getElementById('totalAmount');
		var total = parseInt(amount.value);

		if(type == 1){
			total -= 10;
			document.getElementById('shippingfee').innerText = "0.00";
		}
		amount.value = total;

		var delivery = document.getElementById('delivery');
		var pickup = document.getElementById('pickup');

		delivery.style.pointerEvents  = "none";
		delivery.style.cursor = "default";
		pickup.style.pointerEvents  = "none";
		pickup.style.cursor = "default";
		click = true;

	}

</script>
<div style="font-weight: bold;margin-top: 75px;margin-left: 55px;font-size: 30px;">Check-out</div>
<div class="container-fluid" style="margin-top: 50px;background-color: white;">
	<div class="row" style="display: flex">
		<div style="text-align:left;margin-bottom:0px;margin-right: 40px;padding:20px; width: 40%;font-size: 20px"> Shipping Address: </div>
	</div>
	<form action="{{ route('payWithPaypal') }}" method="post" onsubmit="return validateButton();">

	<div class="row" style="display: flex">
    	<div class="text-center" style="text-align:left;margin-bottom:0px;margin-left: 150px; width: 18%;font-size: 15px">
    			<div class="btn-group btn-group-toggle" data-toggle="buttons" style="display: flex;">					
						<a class="btn btn-info active" data-toggle="tab" id="delivery" href="#Delivery" onclick="addFees()" style="text-decoration: none;color: white">
							<input type="radio" name="deliverytype" id="delivery" value="delivery" autocomplete="off" checked> Delivery
						</a>

						<a class="btn btn-info" data-toggle="tab" id="pickup" href="#PickUp" onclick="removeFee()">
							<input type="radio" name="deliverytype" id="pickup" value="pickup" autocomplete="off">Pick Up
						</a>									  
				</div>	
    	</div>		
	</div>


        <div class="row" style="display: flex">
        		<div style="text-align:right;margin-bottom:50px;margin-left: 150px;margin-right: 150px;padding:20px; background-color: #cecbcb;height: 650px;width: 40%">
	        			<!-- For shipping -->
	        			 <div class="tab-content">
					    	<div id="Delivery" class="tab-pane fade in active" style="text-align: left">
					    		<div class="row" style="margin-left: 10px;margin-bottom: 10px"><h3>Shipping Address</h3></div>

							    		<div class="form-row" style="margin:30px">
											    <div class="form-group col-md-6">
											    	<label for="inputFirstName">First Name</label>
											      	<input type="text" name="firstname" class="form-control" value="<?=Auth::user()->firstname?>" readonly/>
											    </div>
											    <div class="form-group col-md-6">
											    	<label for="inputLastName">Last Name</label>
											      <input type="text" class="form-control" name="lastname" value="<?=Auth::user()->lastname?>" readonly/>
											    </div>
											    <div class="form-group col-md-12">
												    <label for="inputAddress">Address</label>
												    <input type="text" name="address1" class="form-control" id="inputAddress" value="<?=Auth::user()->address1?>" readonly/>
												  </div>
												  <div class="form-group col-md-12"">
												    <label for="inputAddress2">Address 2</label>
												    <input type="text" name="address2" class="form-control" id="inputAddress2" value="<?=Auth::user()->address2?>" readonly>
												  </div>

												<div class="form-group col-md-4">
											      <label for="inputCity">City</label>
											      <input type="text" name="city" class="form-control" id="inputCity" value="<?=Auth::user()->city?>" readonly>
											    </div>
											    <div class="form-group col-md-5">
											      <label for="inputState">State</label>
											      <select id="inputState" name="state" class="form-control" placeholder="State" disabled>
											        <option value="Selangor" <?= Auth::user()->state == "Selangor"?"selected":"" ?>>Selangor</option>
											        <option value="Negeri Sembilan" <?php if(Auth::user()->state == 'Selangor')echo "active"?>>>Negeri Sembilan</option>
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
											      <input type="text" name="postcode" class="form-control" id="inputPostcode" value="<?=Auth::user()->postcode?>" readonly>
									    		</div>
											  <div class="form-group col-md-12">
											  	<label for="inputPhone">Phone</label>
											     <input type="tel" name="phone" class="form-control" id="phone" value="<?=Auth::user()->phone?>" readonly required>
											  </div>
											  <div class="for group col-md-12">
											  	<label for="inputPhone">Order Notes</label>
											      <textarea name="notes" class="form-control" id="orderNotes" rows="3" placeholder="Eg:Number of candles require"></textarea>
											  </div>
											</div> 
										</div>

			        		<div id="PickUp" class="tab-pane fade" style="text-align: left">
						    		<div class="row" style="margin-left: 10px;margin-bottom: 10px"><h3>Pick Up</h3></div>
							    			 <div class="form-row" style="margin:30px">
											    <div class="form-group col-md-6">
											    	<label for="inputFirstName">First Name</label>
											      	<input type="text" class="form-control" value="<?=Auth::user()->firstname?>" readonly/>
											    </div>
											    <div class="form-group col-md-6">
											    	<label for="inputLastName">Last Name</label>
											      <input type="text" class="form-control" value="<?=Auth::user()->lastname?>" readonly/>
											    </div>
											    <div class="form-group col-md-12">
											      <label for="inputState">Branches</label>
											      <select id="inputState" class="form-control" name="branch">
											        <option></option>
											        <option value="Kajang">Kajang</option>
											      </select>
											    </div>
											    <div class="form-group col-md-6">
											    	<label for="inputDate">Date</label>
											      	<input type="date" class="form-control" name="pickupdate"/>
											    </div>
											    <div class="form-group col-md-6">
											    	<label for="inputTime">Time</label>
											      <input type="time" class="form-control" name="pickuptime" />
														<label>**Working Hour is From 9am to 6pm</label>
											    </div>
											  <div class="form-group col-md-12">
											  	<label for="inputPhone">Phone</label>
											     <input type="tel" class="form-control" value="<?=Auth::user()->phone?>" readonly>
											  </div>
											</div> 
			        			</div>
			        	</div>
        		</div>
       	 	</div>
        	<div class="row">
        		<button type="button" class="btn btn-dark col-md-3" id="confirmShipping" onclick="confirm()" style="text-align: center;margin-left: 250px;">Confirm Shipping Mode</button>
			</div>
				<div id="confirmAlert" style="visibility: hidden;text-align:center;font-weight: bold;background-color:#f5f4f4;color:red;margin-left:135px;margin-right:845px;margin-top:5px"><p>Please Confirm Shipping Method</p></div>
       	 	<div class="row" style="margin: 50px;margin-left: 140px;margin-right: 140px;padding:20px; background-color: #cecbcb;height: 600px">
       	 		<table class="table table-hover table-bordered" width="100%" cellspacing="0" style="margin-top: 40px;text-align:center;background-color: white">
		        			<thead style="color: black;font-weight: bold"> <!-- #f8f9fc;-->
		        				<tr style="border-bottom: 2pt solid #eaebf2;border-top: 1pt solid #eaebf2">
		        					<th scope="col" style="text-align:center;width: 55%">Product</th>
			        				<th scope="col" style="text-align:center;width: 15%">Quantity</th>
			        				<th scope="col" style="text-align:center;width: 50%">Total</th>
		        				</tr>
		        			</thead>

        			<tbody style="margin-top: 20px">
        				<?php
							$total = 0;	
        				?>
        				@foreach($shoppingCarts as $i => $cartItem)

        				<?php
        					if($cartItem->size == "slide")
	                      		$price = $cartItem->product->slide_price;
	                      	else if($cartItem->size == "whole")
	                      		$price = $cartItem->product->whole_price;

	                      	$total += ($price * $cartItem->quantity);
        				?>
	                    <tr>
	                      <td>{{$cartItem->product->name}}</td>
		                      <td>{{$cartItem->quantity}} </td>
	                      <td>RM {{$price * $cartItem->quantity}}</td>
	                    </tr>
	                    @endforeach
	                    <tr>
		        			<td colspan="2">
		        					<div style="font-weight: bold">Shipping Fees</div>
							</td>
							<td>RM <span id="shippingfee">10.00</span></td>
		        		</tr>

		        		<tr style="background-color: black; color: white;font-weight: bold">
		        			<td colspan="2">
		        					<div>Total Amount</div>
							</td>
							<td>RM <span><input id="totalAmount" name="amount" value=<?= $total += 10 ?> readonly style="color: white;background-color: black;border: none;text-align: center;"></span></td>
		        		</tr>
	                </tbody>
        		</table>
        					
					<div class="row" style="padding-top: 20px; padding-left: 25px;color: black">
							<h4>Payment Method</h4>
					</div>
					<div style="background-color: white">
						<div class="form-check" style="padding-left: 40px;">
						  <input class="form-check-input" type="radio" name="exampleRadios" id="paypal" value="option1">
						  		<img src="/image/Paypal.jpg" style="margin:15px ;width: 80px;height: 80px">
						  <label class="form-check-label" for="exampleRadios1">
						    Paypal
						  </label>
						</div>
					</div>

					{{csrf_field()}}
					<div class="row" style="padding-top: 20px; padding-right: 25px; text-align: right;">
						<input type="submit" class="btn btn-success"/>
					</div>
				</div>
			</form>
    </div>
	@endsection