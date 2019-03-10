<head>
	<link href="{{ asset('css/menubar.css') }}" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>
<style>
	#image1{
	-webkit-transition-property: width, height; /* Safari */
	-webkit-transition-duration: 2s; /* Safari */
	transition-property: all;
    transition-duration: 0.3s;
    transition-timing-function: cubic-bezier(0.65, 0.05, 0.36, 1);
    transition-delay: 0s;
}

</style>
	@extends('layouts.naviBar')
	@section('content')
	<div class="container" style="margin-top: 80px;background-color: #f0ddcd">
<!-- display menu-->
		<div>
			<div style="margin:20px;background-color:#f0ddcd;color: black;font-style: bold;font-family: serif;">
				<div class="row text-center">
					<h1 style="font-size: 3em;color: white">&hearts; Order Online &hearts;</h1>
				</div>
			</div>
		</div>
		<hr style="border-block-start-width: 5px;border: 1px solid white; border-left: 18px solid #fbb7529e;width: 100%">

	<table style="width: 100%">
		<tr>
			<td class="col-md-3">
				<div style="border-right:solid white;border-width:1px;height: 700px">
						<ul class="nav flex-column">
						  <li class="nav-item">
						    <a class="nav-link active" data-toggle="tab" style="color:#c15e10;font-weight:bold " href="#MilleCrepe">Mille Crepe</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" data-toggle="tab" style="color:#c15e10;font-weight:bold " href="#CheeseCake">Cheese Cake</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" data-toggle="tab" style="color:#c15e10;font-weight:bold " href="#SpongeCake">Sponge Cake</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" data-toggle="tab" style="color:#c15e10;font-weight:bold " href="#CupCake">Cup Cake</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" data-toggle="tab" style="color:#c15e10;font-weight:bold " href="#MousseCake">Mousse Cake</a>
						  </li>
						</ul>
				</div>
			</td>
	<!---need tab -->
			<td class="col-md-6">
				<div class="tab-content" style="overflow-y: scroll;">
					@foreach($categories as $i => $category)
					<?php 

						if($category->id == 1)
							$name = 'MilleCrepe';
						else if($category->id == 2)
							$name = 'CheeseCake';
						else if($category->id == 3)
							$name = 'SpongeCake';
						else if($category->id == 4)
							$name = 'CupCake';
						else if($category->id == 5)
							$name = 'MousseCake';
						?>	

						<div id=<?= $name?> class="tab-pane fade text-center <?php if($name == 'MilleCrepe')echo "active in"?>" style="border-right: solid;border-color: white;border-width:1px;height: 700px;position: relative;">
							<div style="background-color: #f0ddcd">
								<h1 style="font-family:Georgia; color: #823c08"><?= $name?></h1>
							</div>
							<div style="background-color: #f0ddcd">
								<ul style="list-style: none;display:inline-block;">
		<!-- need to do a loop -->
								@foreach($products as $j =>$product)
									@if($product->category_id == $category->id)
									<li class="col-sm-6">
										<a href="{{ route('productDetails', ['id'=>$product->id])}}">
											<div id="imageDiv" style="border:5px solid;border-color: white;background-color: #f1ede6;margin-top: 15px">
												<img src= <?= "/../" . $product->image ?> title="bakery" style="margin:15px;width: 140px;height: 120px;"/>
												<p style="height: 50px;color:black ;background-color: #eaa8b12e"><?=$product->name?></p>
											</div>
										</a>
									</li>
									@endif
								@endforeach

								</ul>
							</div>

						</div>
					@endforeach
				</div>
			</td>

			<td class="col-md-3" style="float:initial">
					<div class="row" style="text-align:center;margin-top:20px">
						<h4 style="font-weight: bold; color:#c15e10">Shopping Cart</h4>
						<hr style="border:1px solid;border-color: white;width: 200px">
					</div>
					<div class="row">
						<img src="/image/shoppingCart.png" style="margin-left: 90px;width: 100px;height: 100px;"/>
						<hr style="border:4px solid;border-color:white;width: 200px">
						<a href="{{ route('shoppingCart')}}"><button type="button" class="btn btn-primary" style="background-color: #6ab532;margin-top:6px;margin-left: 110px;color: white">Pay Now</button></a>
					</div>
			</td>
		</tr>
	</table>
	<!---end of row -->
			</div>
		</div>
	</div>
	@endsection