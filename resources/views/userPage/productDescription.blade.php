@extends('layouts.naviBar')
@section('content')
        <div class="container-fluid" style="margin-bottom:135px;margin-top: 93px;background-color: white">
        	<div class="row" style="margin: 50px;margin-left: 230px;margin-right: 230px;padding:20px; background-color: #cecbcb;height: 450px">
        	<!--card board-->

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
                                          {{$error->name}} quantity has exceed the current stock!
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-primary" onclick="document.getElementById('modal').style.display = 'none';" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                        </div>
                    </div>
        	@endif
        	<form action="{{ route('addCartItem',['id'=> $product->id,'uid' =>Auth::user()->id]) }}" method="get">
        	<table>
        		<tr>
        			<td>
			        	<img src=<?= "/../". $product->image?> title="bakery" style="padding-left:50px;margin:15px;width: 400px;height: 335px;"/>
			        </td>
			        <td width="1000px" style="padding-left: 120px;vertical-align: top;text-align: left;">
			        	<div class="row">
				        		<div>
									<h3 style="color: black;font-weight: bold"><?=$product->name?></h3>
								</div>
						</div>
						<div class="row" style="padding-top: 10px ">
								<h4 style="color: #4482e2;font-weight: bold"><?=$product->slide_price?> to <?=$product->whole_price?></h4>
						</div>
						<div class="row" style="padding-top: 15px ">
								<p><?=$product->description?></p>
						</div>
						<div class="row" style="padding-top: 10px ">
								
								<div class="btn-toolbar"role="toolbar" aria-label="Toolbar with button groups">
									<h4 style="color: #4482e2;font-weight: bold">Size </h4>
									<div class="btn-group btn-group-toggle" data-toggle="buttons" style="padding-left: 40px">
									  <label class="btn btn-info active">
									    <input type="radio" name="size" id="slide" value="slide" autocomplete="off" checked> Slide
									  </label>
									  <label class="btn btn-info">
									    <input type="radio" name="size" id="whole" value="whole" autocomplete="off"> Whole
									  </label>
									  
									</div>							  
								</div>
						</div>
						<div class="row" style="padding-top: 10px ">
							<p style="font-size:15px; color: #4482e2;font-weight: bold">Current Stock:  <?=$product->quantity?> </p>
						</div>
						<div class="row" style="padding-top: 10px ">
							<input id="number" name="quantity" min="1" type="number" value="1" style="width: 58px">
						</div>
						<div class="row" style="padding-top: 20px; padding-right: 25px; text-align: right;">
							
							<button type="submit" name="Cust" value="notCustomize" class="btn btn-success">Add to cart</button>
							<button type="submit" style="margin-right: 20px" formaction="{{ route('customCake',['id'=> $product->id])}}" class="btn btn-success">Make your own</button>
						</div>
					</td>
				</tr>
			
			</table>
			</form>
	        </div>
	    </div>
	
@endsection