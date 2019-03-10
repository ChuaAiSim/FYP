	@extends('layouts.naviBar')
	@section('content')

	 <div class="container-fluid" style="margin-bottom:135px;margin-top: 80px;background-color: white">
        	<div class="row" style="margin: 50px;margin-left: 230px;margin-right: 230px;padding:20px; background-color: #cecbcb;height: 95%">
        	<form action="{{ route('updateCustomCake', ['pid' => $product->id]) }}" method="post">
        		<table>
	        		<tr>
	        			<td>
	        				 <img src=<?= "/../". $product->image?> title="bakery" style="padding-left:50px;margin:5px;width: 400px;height: 360px;margin-top: -180px;"/>
	        			</td>

	        			<td width="1000px" style="padding-left: 120px;vertical-align: top;text-align: left;">
			        		<div class="row">
				        		<div>
									<h3 style="color: black;font-weight: bold">Custom Cake</h3>
								</div>
							</div>

							<div class="row" style="padding-top: 10px;">
								<h4 style="color: #4482e2;font-weight: bold">RM <?= $product->whole_price?> (subject to change)</h4>
							</div>
							<div class="row form-group" style="padding-top: 10px; display: inline-flex; ">
								<h4 style="color: #4482e2;font-weight: bold;width: 100%">1) Change Topping</h4>
									      <select name="topping" class="form-control" style="margin-left: 100px;width:175%">
									      	<option value="Original" <?= $product->topping == "Original"?"selected":"" ?>>Original (Same as photo)</option>
											<option value="Candies" <?= $product->topping == "Candies"?"selected":"" ?>>Mini chocolate candies</option>
									        <option value="Fruit" <?= $product->topping == "Fruit"?"selected":"" ?>>Fresh fruit</option>
									        <option value="MF" <?= $product->topping == "MF"?"selected":"" ?>>Moldable fondant (eg:marshmallow))</option>
									        <option value="Powder" <?= $product->topping == "Powder"?"selected":"" ?>>Powdered sugar or cocoa</option>
									        <option value="Coconut" <?= $product->topping == "Coconut"?"selected":"" ?>>Shredded or toasted coconut</option>
									        <option value="Nut" <?= $product->topping == "Nut"?"selected":"" ?>>Chopped, slivered, or toasted nuts</option>
									        <option value="Chocolate" <?= $product->topping == "Chocolate"?"selected":"" ?>>Chocolate curls/chips</option>
									        <option value="Flowers" <?= $product->topping == "Flowers"?"selected":"" ?>>Spun-sugar flowers </option>
									        <option value="Cookies" <?= $product->topping == "Cookies"?"selected":"" ?>>Small cookies such as animal crackers</option>
									        <option value="Others" <?= $product->topping == "Others"?"selected":"" ?>>Others (State in specific request)</option>
										</select>	 
							</div>
							<div class="row form-group" style="padding-top: 10px ;display: inline-flex;">
								<h4 style="color: #4482e2;font-weight: bold;width: 300px;">2) Change Main Flavor</h4>
									      <select name="flavor" class="form-control" style="width:60%">
											<option value="Mint" <?= $product->flavor == "Mint"?"selected":"" ?>>Mint</option>
									        <option value="Chocolate" <?= $product->flavor == "Chocolate"?"selected":"" ?>>Chocolate</option>
									        <option value="Vanilla" <?= $product->flavor == "Vanilla"?"selected":"" ?>>Vanilla</option>
									        <option value="Banana" <?= $product->flavor == "Banana"?"selected":"" ?>>Banana</option>
									        <option value="ChocolateBanana" <?= $product->flavor == "ChocolateBanana"?"selected":"" ?>>Chocolate Banana</option>
									        <option value="Matcha" <?= $product->flavor == "Matcha"?"selected":"" ?>>Green Tea/Matcha</option>
									        <option value="Yam" <?= $product->flavor == "Yam"?"selected":"" ?>>Yam</option>
									        <option value="Original" <?= $product->flavor == "Original"?"selected":"" ?>>Signature/Original </option>
									        <option value="Coffee" <?= $product->flavor == "Coffee"?"selected":"" ?>>Coffee</option>
									        <option value="Durian" <?= $product->flavor == "Durian"?"selected":"" ?>>Durian</option>
									        <option value="Oreo" <?= $product->flavor == "Oreo"?"selected":"" ?>>Oreo</option>
									        <option value="Berries" <?= $product->flavor == "Berries"?"selected":"" ?>>Berries(eg: Strawberry)</option>
									        <option value="Pandan" <?= $product->flavor == "Pandan"?"selected":"" ?>>Pandan</option>
									        <option value="Mango" <?= $product->flavor == "Mango"?"selected":"" ?>>Mango</option>
									        <option value="Fruit" <?= $product->flavor == "Fruit"?"selected":"" ?>>Fruit</option>
									        <option value="BrownButter" <?= $product->flavor == "BrownButter"?"selected":"" ?>>Brown Butter</option>
									        <option value="Others" <?= $product->flavor == "Others"?"selected":"" ?>>Others (State in specific request)</option>
										</select>	 
							</div>
							<div class="row form-group" style="padding-top: 10px;display: inline-flex;">
								<h4 style="color: #4482e2;font-weight: bold;width: 300px">3) Change Ingredient</h4>
									      <select name="ingredient" class="form-control" style="width:60%">
											<option value="Original" <?= $product->ingredient == "Original"?"selected":"" ?>>Original(Same as picture)</option>
									        <option value="Others" <?= $product->ingredient == "Others"?"selected":"" ?>>Others (State in specific request)</option>
										</select>	
							</div>
							<div class="row" style="padding-top: 10px;display: inline-flex; ">
								<h4 style="color: #4482e2;font-weight: bold;width: 300px">4) Change Cream Flavor</h4>
									      <select name="cream" class="form-control" style="width:60%">
											<option value="Mint" <?= $product->cream == "Mint"?"selected":"" ?>>Mint</option>
									        <option value="Chocolate" <?= $product->cream == "Chocolate"?"selected":"" ?>>Chocolate</option>
									        <option value="Vanilla" <?= $product->cream == "Vanilla"?"selected":"" ?>>Vanilla</option>
									        <option value="Banana" <?= $product->cream == "Banana"?"selected":"" ?>>Banana</option>
									        <option value="ChocolateBanana" <?= $product->cream == "ChocolateBanana"?"selected":"" ?>>Chocolate Banana</option>
									        <option value="Matcha" <?= $product->cream == "Matcha"?"selected":"" ?>>Green Tea/Matcha</option>
									        <option value="Yam" <?= $product->cream == "Yam"?"selected":"" ?>>Yam</option>
									        <option value="Original" <?= $product->cream == "Original"?"selected":"" ?>>Signature/Original</option>
									        <option value="Coffee" <?= $product->cream == "Coffee"?"selected":"" ?>>Coffee</option>
									        <option value="Durian" <?= $product->cream == "Durian"?"selected":"" ?>>Durian</option>
									        <option value="Oreo" <?= $product->cream == "Oreo"?"selected":"" ?>>Oreo</option>
									        <option value="Coffee" <?= $product->cream == "Coffee"?"selected":"" ?>>Coffee</option>
									        <option value="Berries" <?= $product->cream == "Berries"?"selected":"" ?>>Berries(eg: Strawberry)</option>
									        <option value="Pandan" <?= $product->cream == "Pandan"?"selected":"" ?>>Pandan</option>
									        <option value="Mango" <?= $product->cream == "Mango"?"selected":"" ?>>Mango</option>
									        <option value="BrownButter" <?= $product->cream == "BrownButter"?"selected":"" ?>>Brown Butter</option>
									        <option value="Others" <?= $product->cream == "Others"?"selected":"" ?>>Others (State in specific request)</option>
										</select>
							</div>
							<div class="form-group row" style="display:flex;padding-top: 10px;padding-left: 4px;margin-top: 8px">
									<h4 style="color: #4482e2;font-weight: bold">5) Size (kg) </h4>
									<input id="text" value="1 kg" style="width: 210px;margin-left: 164px;margin-top: 10px;height: 30px" disable readonly="true" />
							</div>
						</div>
							<div class="row" style="padding-top: 10px;display: flex;">
								<h4 style="color: #4482e2;font-weight: bold">6) Quantity</h4>
								<input id="number" name="quantity" min="1" type="number" value="1" style="width: 210px;margin-left: 164px;margin-top: 10px;height: 30px"/>
							</div>
							<div class="row" style="padding-top: 10px;">
								<h4 style="color: #4482e2;font-weight: bold">7) Any Special Request</h4>
								<textarea class="form-control" name="specialRequest" rows="5" id="comment" style="margin-left:20px;width: 450px"></textarea>
							</div>

							{{ csrf_field()}}
							<div class="row" style="padding-top: 40px; padding-right: 40px; text-align: right;">
								<input type="submit" class="btn btn-success" value="Add to cart"/>
							</div>
	        			</td>
	        		</tr>
	        	</table>
	        </form>
        	</div>
     </div>
	@endsection