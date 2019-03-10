@extends('layouts.admin')

@section('content')
		<script>
					function displayImge(){
						var file = document.getElementById("pic").files[0];
						var reader = new FileReader();
						reader.onload = function(e){
							var image = document.getElementById("img");
							image.src = e.target.result;
						}
						reader.readAsDataURL(file);
					}
		</script>
		<div class="container-fluid">
	          <h1 class="h3 mb-2 text-gray-800">Edit Stock Details</h1>


	        	<div class="row" style="margin-left: 5%;margin-top:3%;width: 95%;padding:20px; background-color: #cecbcb;height: 80%">
	        	<!--card board-->
	        	<form action="{{ route('updateStock',['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
	        	<table>
	        		<thead>
	        			<tr>
		        			<td> 
					        	<img id="img" style="padding-left:50px;margin:15px;width: 500px;height: 500px;" src= <?= "../" .$product->image ?>/>
					        </td>

					        <td width="1000px" style="padding-left: 120px;vertical-align: top;text-align: left;">
							    		<div class="form-row">
											    <div class="form-group col-md-11">
											    	<label for="inputFirstName">Product Name</label>
											      	<input type="text" name="name" class="form-control" value="{{$product->name}}">
											    </div>
					        			</div>


										 <div class="form-row">
										  	 <div class="form-group col-md-5">
										      <label for="inputCategory">Category</label>
										      <select id="inputCategory" name="category" class="form-control" placeholder="Category">
										      	<?php 
										      		$pId = $product->category_id;

										      	if($pId == 1)
										      		echo 
										      		"<option value='1' selected>Mille Crepe</option>
											        <option value='2'>Cheese Cake</option>
											        <option value='3'>Sponge Cake</option>
											        <option value='4'>Cup Cake</option>
											        <option value='5'>Mousse Cake</option>";
										      	else if($pId == 2)
													echo 
										      		"<option value='1'>Mille Crepe</option>
											        <option value='2' selected>Cheese Cake</option>
											        <option value='3'>Sponge Cake</option>
											        <option value='4'>Cup Cake</option>
											        <option value='5'>Mousse Cake</option>";
										      	else if($pId == 3)
											     	echo "
											     	<option value='1'>Mille Crepe</option>
											        <option value='2'>Cheese Cake</option>
											        <option value='3' selected>Sponge Cake</option>
											        <option value='4'>Cup Cake</option>
											        <option value='5'>Mousse Cake</option>";
											        
											    else if($pId == 4)
											     	echo "
											     	<option value='1'>Mille Crepe</option>
											        <option value='2'>Cheese Cake</option>
											        <option value='3'>Sponge Cake</option>
											        <option value='4' selected>Cup Cake</option>
											        <option value='5'>Mousse Cake</option>";
											     
											    else if($pId == 5)
											     	echo "
											     	<option value='1'>Mille Crepe</option>
											        <option value='2'>Cheese Cake</option>
											        <option value='3'>Sponge Cake</option>
											        <option value='4'>Cup Cake</option>
											        <option value='5' selected>Mousse Cake</option>";
											        ?>
										      </select>										      
										    </div>
										    <div class="form-group col-md-3">
											    <label for="priceSlide">Price(Slide)</label>
											    <input type="number" step=".01" name="priceSlide" class="form-control" name="priceSlide" min="1" value="{{ $product->slide_price}}">
											  </div>
											  <div class="form-group col-md-3">
											  	<label for="priceWhole">Price(Whole)</label>
											     <input type="number" step=".01" name="priceWhole" class="form-control" name="priceWhole" min="1" value="{{ $product->whole_price}}">
											  </div>
										</div>

										<div class="form-row">
											    <div class="form-group col-md-11">
											    	<label for="inputDescription">Description</label>
											      	<textarea class="form-control" id="inputDescription" rows="5"  name="description">{{ $product->description}}</textarea>
											    </div>
					        			</div>

					        			<div class="form-row">
					        				<div class="col-md-5">
				  								<label for="inputQuantity">Quantity</label>
												<input type="number" class="form-control" name="quantity" min="1" value="{{ $product->quantity}}">
											</div>
											<div class="col-md-6">
				  								<label for="inputStatus">Status</label>
												<select name="status" class="form-control" placeholder="Status">
													<option value='Available' <?= $product->status=="Available"?"selected":"" ?>>Available</option>
													<option value='Not Available' <?= $product->status=="Not Available"?"selected":"" ?>>Not Available</option>

										      </select>
											</div>
										</div>

										<div class="form-row" style="margin-top: 10px">
					        				<div class="col-md-5">
				  								<label for="inputQuantity">Topping</label>
												<select name="topping" class="form-control">
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
												</select>	
											</div>
											<div class="col-md-6">
				  								<label for="inputStatus">Main Flavor</label>
												<select name="flavor" class="form-control" placeholder="Flavor">
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
												</select>
											</div>
										</div>

										<div class="form-row" style="margin-top: 10px">
					        				<div class="col-md-5">
				  								<label for="inputQuantity">Ingredient</label>
				  								<select name="ingredient" class="form-control"placeholder="Ingredient">
				  									<option value="Original selected">Original</option>
				  								</select>
												
											</div>
											<div class="col-md-6">
				  								<label for="inputStatus">Cream</label>
												<select name="cream" class="form-control" placeholder="Cream">
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
										      </select>
											</div>
										</div>
							</td>
						</tr>
					</thead>
					<tbody style="width: 100%">
						<tr>
							<td>
								<div class="row" style="display: flex;padding-top: 20px;">
									<input id="pic" style="margin-left: 47px"" type="file" name="pic" accept="image/*" placeholder="{{ $product->image}}" onchange="displayImge()">
	  							 </div>
	  						</td>
	  						<td>
	  							{{csrf_field()}}
	  							 <div class="row" style="padding-top: 30px; margin-left: 605px; ">
									<button type="submit" class="btn btn-success">Upload Product</button>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		    </div>
		 </div>


</div>
@endsection