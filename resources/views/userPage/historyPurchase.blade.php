	@extends('layouts.naviBar')
	@section('content')
		<div class="container-fluid" style="margin-top: 80px;background-color: white">
			<h2 style="margin:20px;color: black;font-weight: bold">History Purchased</h2>

    <div class="w3-container">
			@if ($message = Session::get('success'))
	        <div class="panel panel-sucess" style="background-color: #cbfada">
	            <div class="panel-body"><p>{!! $message !!}</p></div>
	        </div>
	        <?php Session::forget('success');?>
	        @endif

	        @if ($message = Session::get('error'))
	        <div class="panel-danger" style="background-color: #ffdbdb">
	            <div class="panel-body"><p>{!! $message !!}</p></div>
	        </div>
	        <?php Session::forget('error');?>
	        @endif
	</div>
			<table class="table table-hover table-bordered" width="90%" cellspacing="0" style="text-align:center;background-color: #3a8fb759;color: black">
				<thead>
					<tr>
						<th>No</th>
						<th>Date</th>
						<th>Status</th>
						<th>Amount</th>
						<th>Shipping Method</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($orders as $i => $order)
					<?php
					if($order->status =="pending")
						$status = "Pending Process";
					else if($order->status =="processing")
						$status = "Processing";
					else if($order->status =="shipping")
						$status = "Shipping";
					else if($order->status =="delivered")
						$status = "Delivered";
					else if($order->status =="pickup")
						$status = "Waiting For Pick Up";
					else if($order->status =="pickedup")
						$status = "Picked Up";
					else if($order->status =="completed")
						$status = "Completed";
					?>
					<tr>
						<td>{{$i+1}}</td>
						<td>{{ $order->date}}</td>
						<td>{{$status}}</td>
						<td>{{$order->amount}}</td>
						<td><?php
							if($order->deliverytype ==1)
								echo "Pick Up";
							else if($order->deliverytype ==0)
								echo "Delivery"
						?></td>
						<td>
							<a href="{{ route('historyPurchaseDetails', ['oId' => $order->id]) }}"><button type="button" class="btn btn-dark" style="text-align: center;width: 100%">View Details</button></a>
						</td>
					</tr>
					@endforeach
				</tbody>

			</table>
		</div>
	@endsection