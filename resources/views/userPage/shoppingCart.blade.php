	@extends('layouts.naviBar')
	@section('content')
	<div class="container-fluid" style="margin-bottom:220px;margin-top: 80px;background-color: white">
		@if(isset($error))
		<div class="modal fade in" tabindex="-1" id="modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: block">
        			<div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Alert!</h5>
                                          <button type="button" class="close" onclick="document.getElementById('modal').style.display = 'none';" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          {{$error->product->name}} quantity has exceed the current stock!
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-primary" onclick="document.getElementById('modal').style.display = 'none';" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                  </div>
                    </div>
        		@endif
		<h2 style="margin:20px;color: black;font-weight: bold">My Shopping Cart</h2>
        	<div class="row" style="margin: 50px;margin-left: 230px;margin-right: 230px;padding:20px; background-color: #cecbcb;height: 100%">

        		
        		<table class="table table-hover table-bordered" width="100%" cellspacing="0" style="text-align:center;background-color: white">
        			<thead style="background-color: black; color: white;font-weight: bold"> <!-- #f8f9fc;-->
        				<tr style="border-bottom: 2pt solid #eaebf2;border-top: 1pt solid #eaebf2">
        					<th style="text-align:center;width: 5%">#</th>
        					<th style="text-align:center;width: 20%">Image</th>
        					<th style="text-align:center;width: 25%">Product</th>
	        				<th style="text-align:center;width: 11%">Price</th>
	        				<th style="text-align:center;width: 8%">Quantity</th>
	        				<th style="text-align:center;width: 11%">Total</th>
	        				<th style="text-align:center;width: 20%">Action</th>
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
	                    	<td>{{$i+1}}</td>
	                      <td><img style="width:80px;height:80px;" src= <?= "/../" . $cartItem->product->image ?>/></td>
	                      <td>{{$cartItem->product->name}}</td>
	                      <td>{{ $price}}
	                      	</td>
	                      <td>{{$cartItem->quantity}}</td>
	                      <td>{{ $price * $cartItem->quantity}}</td>
	                      <td>
	                      	<button type="button" class="btn btn-dark" data-toggle="modal" data-target=<?="#exampleModal" . $cartItem->id?> style="text-align: center;width: 100%">Delete</button>
                                <!-- Modal -->
                                  <div class="modal fade" id=<?="exampleModal" . $cartItem->id?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          Do you want to delete this product?
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <a href="{{ route('deleteCartItem',['id' => $cartItem->id]) }}"><button type="button" class="btn btn-primary">Yes</button></a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
	                      </td>
	                    </tr>
	                     @endforeach
	                </tbody>
        		</table>

        	<!--	<div class="row" style="padding-top: 20px;">
					<div style="padding-left: 25px; text-align: right;">
        				<input style="margin-right: 20px" id="couponInput">
        				<a href="#"><button type="button" class="btn btn-primary" style="margin-right: 20px">Apply Coupon</button></a>
        			</div>
				</div>-->
				<table class="table table-hover table-bordered" width="100%" cellspacing="0" style="margin-top: 40px;text-align:center;background-color: white">

        					<tr style="border-bottom: 2pt solid #eaebf2;border-top: 1pt solid #eaebf2">
        					</tr>
		        			<tr>
		        				<th style="width: 20%">Sub Total</th>
		        				<td>RM {{$total}}.00</td>
		        			</tr>
		        			<tr>
		        				<th style="width: 20%">Discount</th>
		        				<td>RM 0.00</td>
		        			</tr>
		        			<tr>
		        				<th style="width: 20%">Total</th>
		        				<td>RM {{$total}}.00</td>
		        			</tr>
		        			<tr>
		        				<td colspan="2">
		        					
								</td>
		        			</tr>
				</table>
				<div class="row" style="padding-top: 20px; padding-right: 25px; text-align: right;">								
									<a href="{{route('checkout')}}"><button type="button" class="btn btn-success">Check-out</button></a>
									</div>
        	</div>
        </div>
	@endsection