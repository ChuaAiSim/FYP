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
	          <h1 class="h3 mb-2 text-gray-800">New Stock Details</h1>


	        	<div class="row" style="margin-left: 5%;margin-top:3%;width: 95%;padding:20px; background-color: #cecbcb;height: 95%">
	        	<!--card board-->
	        	<form action="{{ route('addStock') }}" method="post" enctype="multipart/form-data">
	        	<table>
	        		
	        		<thead>
	        			<tr>
		        			<td>
					        	<img id="img" src="/image/imageToBeUpload.jpg" title="imageToBeUpload" id="imageToBeUpload" style="padding-left:50px;margin:15px;width: 500px;height: 500px;"/>
					        </td>

					        <td width="1000px" style="padding-left: 120px;vertical-align: top;text-align: left;">
					        	
							    		<div class="form-row">
											    <div class="form-group col-md-11">
											    	<label for="inputFirstName">Product Name</label>
											      	<input name="name" type="text" class="form-control" placeholder="Product name">
											    </div>
					        			</div>


										 <div class="form-row">
										  	 <div class="form-group col-md-5">
										      <label for="inputCategory">Category</label>
										      <select name="category" class="form-control" placeholder="Category">
										        <option value="1">Mille Crepe</option>
										        <option value="2">Cheese Cake</option>
										        <option value="3">Sponge Cake</option>
										        <option value="4">Cup Cake</option>
										        <option value="5">Mousse Cake</option>
										      </select>
										    </div>
										  	 <div class="form-group col-md-3">
											    <label for="priceSlide">Price(Slide)</label>
											    <input type="number" step=".01" class="form-control" name="priceSlide" min="1" required>
											  </div>
											  <div class="form-group col-md-3">
											  	<label for="priceWhole">Price(Whole)</label>
											     <input type="number" step=".01" class="form-control" name="priceWhole" min="1" required>
											  </div>
										</div>

										<div class="form-row">
											    <div class="form-group col-md-11">
											    	<label for="inputDescription">Description</label>
											      	<textarea class="form-control" name="description" rows="5"></textarea>
											    </div>
					        			</div>

					        			<div class="form-row">
					        				<div class="col-md-5">
				  								<label for="inputQuantity">Quantity</label>
												<input type="number" class="form-control" name="quantity" min="1" required>
											</div>
											<div class="col-md-6">
				  								<label for="inputStatus">Status</label>
												<select name="status" class="form-control" placeholder="Status">
										        <option value="Available">Available</option>
										        <option value="Not Available">Not Available</option>
										      </select>
											</div>
										</div>

										<div class="form-row" style="margin-top: 10px">
					        				<div class="col-md-5">
				  								<label for="inputQuantity">Topping</label>
												<select name="topping" class="form-control">
													<option value="Original">Original (Same as photo)</option>
													<option value="Candies">Mini chocolate candies</option>
											        <option value="Fruit">Fresh fruit</option>
											        <option value="MF">Moldable fondant (eg:marshmallow))</option>
											        <option value="Powder">Powdered sugar or cocoa</option>
											        <option value="Coconut">Shredded or toasted coconut</option>
											        <option value="Nut">Chopped, slivered, or toasted nuts</option>
											        <option value="Chocolate">Chocolate curls/chips</option>
											        <option value="Flowers">Spun-sugar flowers </option>
											        <option value="Cookies">Small cookies such as animal crackers</option>
												</select>	
											</div>
											<div class="col-md-6">
				  								<label for="inputStatus">Main Flavor</label>
												<select name="flavor" class="form-control" placeholder="Flavor">
										        	<option value="Mint">Mint</option>
											        <option value="Chocolate">Chocolate</option>
											        <option value="Vanilla">Vanilla</option>
											        <option value="Banana">Banana</option>
											        <option value="ChocolateBanana">Chocolate Banana</option>
											        <option value="Matcha">Green Tea/Matcha</option>
											        <option value="Yam">Yam</option>
											        <option value="Original">Signature/Original </option>
											        <option value="Coffee">Coffee</option>
											        <option value="Durian">Durian</option>
											        <option value="Oreo">Oreo</option>
											        <option value="Berries">Berries(eg: Strawberry)</option>
											        <option value="Pandan">Pandan</option>
											        <option value="Mango">Mango</option>
											        <option value="Fruit">Fruit</option>
											        <option value="BrownButter">Brown Butter</option>
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
											        <option value="Mint">Mint</option>
											        <option value="Chocolate">Chocolate</option>
											        <option value="Vanilla" >Vanilla</option>
											        <option value="Banana">Banana</option>
											        <option value="ChocolateBanana">Chocolate Banana</option>
											        <option value="Matcha">Green Tea/Matcha</option>
											        <option value="Yam">Yam</option>
											        <option value="Original">Signature/Original</option>
											        <option value="Coffee">Coffee</option>
											        <option value="Durian">Durian</option>
											        <option value="Oreo">Oreo</option>
											        <option value="Coffee">Coffee</option>
											        <option value="Berries">Berries(eg: Strawberry)</option>
											        <option value="Pandan">Pandan</option>
											        <option value="Mango">Mango</option>
											        <option value="BrownButter">Brown Butter</option>
										      </select>
											</div>
										</div>
					        	
							</td>
						</tr>
					</thead>
					<tbody style="width: 100%">
						<tr>
							<td>
								<div class="row" style="padding-top: 20px;">
									<input id="pic" style="text-align:center;margin-left: 50px" type="file" name="pic" accept="image/*" onchange="displayImge()">
	  							 	<!--<input type="submit" value="upload image">-->
	  							 </div>
	  						</td>
	  						<td>
	  							{{csrf_field()}}
	  							 <div class="row" style="padding-top: 30px; margin-left: 605px; ">
									<button type="submit" class="btn btn-success">Add Product</button>
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