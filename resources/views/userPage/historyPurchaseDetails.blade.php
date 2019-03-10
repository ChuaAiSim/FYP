	@extends('layouts.naviBar')
	@section('content')
	<div class="container-fluid" style="margin-bottom:560px;margin-top: 80px;background-color: white">
			<h2 style="margin:20px;color: black;font-weight: bold">History Purchased</h2>

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