@extends('layouts.admin')

@section('content')
<div class="container-fluid">
	          <h1 class="h3 mb-2 text-gray-800">Order Details</h1>
	<!--card board-->
	        	<form action="{{ route('updateOrders',[$order->id]) }}" method="post" enctype="multipart/form-data">
	        	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	        		
	        		<thead>
	        			<tr>
	        				<th>No</th>
	        				<th>Image</th>
	        				<th>Product</th>
	        				<th>Total Price</th>
	        				<th>Quantity</th>
	        				<th>Is Custom Cake</th>
	        			</tr>
	        		</thead>
	        		<tbody style="width: 100%">
	        			@foreach($cartItems as $i => $cartItem)
	        			<?php
						if($cartItem->size == "slide")
	                      		$price = $cartItem->product->slide_price;
	                      	else if($cartItem->size == "whole")
	                      		$price = $cartItem->product->whole_price;
					?>
	        			<tr>
	        				<td>{{$i+1}}</td>
		        			<td>
					        	<img style="margin:15px;width: 80px;height: 80px;" src=<?= "/../" . $cartItem->product->image ?> />
					        </td>
					        <td>{{$cartItem->product->name}}</td>
					        <td>RM {{ $price * $cartItem->quantity}}</td>
					        <td>{{$cartItem->quantity}}</td>
							<td><?php
								if($cartItem->isCustomize ==1)
									echo "Yes";
								else if($cartItem->isCustomize ==0)
									echo "No";
							?></td>
						</tr>
					@endforeach
					<tr>
					<td style="font-weight: bold">Order Made By</td>
	  						<td colspan="5">
	  							 <div class="row" style="padding: 10px; margin-left: 100px;width:70%; ">
										<div>{{$user->firstname." " .$user->lastname}}</div>
										</div>
					</tr>
						<tr>
							<td style="font-weight: bold">Update Status</td>
	  						<td colspan="5">
	  							 <div class="row" style="padding: 10px; margin-left: 100px;width:70%; ">
									<select name="status">
										<option value="pending" <?= $order->status == "pending"?"selected":"" ?>>Pending Payment</option>
										<option value="processing" <?= $order->status == "processing"?"selected":"" ?>>Processing</option>
										<option value="shipping" <?= $order->status == "shipping"?"selected":"" ?>>Shipping</option>
										<option value="delivered" <?= $order->status == "delivered"?"selected":"" ?>>Delivered</option>
										<option value="pickup" <?= $order->status == "pickup"?"selected":"" ?>>Waiting For Pick Up</option>
										<option value="pickedup" <?= $order->status == "pickedup"?"selected":"" ?>>Picked Up</option>
										<option value="completed" <?= $order->status == "completed"?"selected":"" ?>>Completed</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
	  						<td colspan="6">
	  							{{csrf_field()}}
	  							 <div class="row" style="padding-top: 20px; margin-left: 680px; ">
									<button type="submit" class="btn btn-success">Update Order</button>
								</div>
							</td>
						</tr>
					</tbody>
				
				</table>
				</form>
		    </div>
</div>

@endsection