<div>
	<div><h2 style="margin:30px;color: black;font-weight: bold">Order Details Confirmation</h2></div>
	<table width="80%" style="margin-left:20px;border-collapse: collapse;color: black;border-bottom: 2px solid pink;text-align: center">
			<tr>
			<?php 
					if($order->deliverytype == 0){
						$shipping = "Delivery";
					}else{
						$shipping = "Pick Up";
					}
			?>
				<th>Date: <?= $order->date->format('Y-m-d H:i:s');?></th>	
				<th>Shipping Method: {{$shipping}}</th>							
				<th>Total Amount: RM {{$order->amount}}</th>
			</tr>
	</table>
	<table width="80%" style="margin-left:20px;border-collapse: collapse;text-align:center;color: black;border:1px solid pink">
			<thead>
				<tr>
					<th>No</th>
					<th>Product Name</th>
					<th>Quantity</th>
					<th>Single Price</th>	
				</tr>	
			</thead>

			<tbody>
				@foreach($order->cartItems as $index=>$cartItem)
				<?php 
					if($cartItem->size == "whole"){
						$price = $cartItem->product->whole_price;
					}else{
						$price = $cartItem->product->slide_price;
					}
				?>
				<tr>
					<td>{{$index+1}}</td>
					<td>{{$cartItem->product->name}}</td>
					<td>RM {{$price}}</td>
					<td>{{$cartItem->quantity}}</td>
				</tr>
				@endforeach	
			</tbody>
		</table>

</div>