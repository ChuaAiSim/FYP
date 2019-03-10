@extends('layouts.naviBar')
	@section('content')
	<div class="container-fluid" style="margin-bottom:560px;margin-top: 80px;background-color: white">
			<h2 style="margin:20px;color: black;font-weight: bold">Track My Order</h2>

			<ol class="track-progress">
			  <li class="done">
			    <em>1</em>
			    <img src="../image/pending.png" class="rounded" style="width:50px;height:50px;border:1px solid black"/>Pending Process
			  </li>
			  <li class="done">
			    <em>2</em>
			    <img src="../image/waitForPickUp1.jpg" style="width:50px;height: 50px"/>Shipping/Waiting For Pick Up
			  </li>
			  <li class="todo">
			    <em>3</em>
			    <img src="../image/pickUp.jpg" style="width:50px;height: 50px">Delivered/Picked Up</span>
			  </li>
			  <li class="todo">
			    <em>4</em>
			    <img src="../image/completed.png" class="rounded" style="width:50px;height:50px;border:1px solid black"/>Completed
			  </li>
			</ol>
                    <!-- class names: c0 c1 c2 c3 and c4 -->
                <div class="image-order-status image-order-status-active active img-circle">
                    <button type="button" class="btn btn-info btn-circle btn-lg" readonly><img src="../image/inProgress.jpg" style="width: 50px;height: 50px" />Processing</button>
                </div>
<ul class="nav nav-wizard">
  	<li class="active"><a href="#"><span class="badge badge-step">1</span> Home</a></li>
    <li><a href="#"><span class="badge badge-step">2</span> Benefits</a></li>
    <li><a href="#"><span class="badge badge-step">3</span> Information</a></li>
  	<li><a href="#"><span class="badge badge-step">4</span> Plans</a></li>
  	<li><a href="#"><span class="badge badge-step">5</span> Life Insurance</a></li>
</ul>
    

			<table class="table table-hover table-bordered" width="90%" cellspacing="0" style="text-align:center;background-color:#95c189;color: black">
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
				<tbody>
					@foreach ($cartItems as $i => $cartItem)
					<?php
						if($cartItem->size == "slide")
	                      		$price = $cartItem->product->slide_price;
	                      	else if($cartItem->size == "whole")
	                      		$price = $cartItem->product->whole_price;
					?>
					<tr>
						<td>{{$i+1}}</td>
						<td><img style="width:80px;height:80px;" src=<?= "/../" . $cartItem->product->image?>/></td>
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
				</tbody>

			</table>
		</div>
	@endsection