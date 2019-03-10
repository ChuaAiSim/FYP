<head>
	<!-- Styles -->
	<link href="{{ asset('css/menubar.css') }}" rel="stylesheet">
</head>
@extends('layouts.naviBar')
@section('content')

    <div class="container">
    	<div class="text-center" style="margin: 15px">
    		<img src="/image/menu.png" style="width:480px ;height: 115px"></img>
    	</div>
    	<!-- For button -->
    	<div class="text-center" style="margin:20px">
    		<ul class="nav-justified nav nav-tabs">
    			<li class="active"><a data-toggle="tab" href="#MilleCrepe">Mille Crepe</a></li>
    			<li><a data-toggle="tab" href="#CheeseCake">Cheese Cake</a></li>
    			<li><a data-toggle="tab" href="#SpongeCake">Sponge Cake</a></li>
    			<li><a data-toggle="tab" href="#MousseCake">Mousse Cake</a></li>
    			<li><a data-toggle="tab" href="#CupCake">Cup Cake</a></li>
    		</ul>
    	</div>

    <!-- For menu -->
	    <div class="tab-content">
	    	@foreach ($categories as $i => $category)
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
			    	<div id=<?=$name?> class="tab-pane fade <?php if($name == 'MilleCrepe')echo "active in"?>" style="margin: 30px">
			    		<div class="row" style="margin: 10px">
			    			@foreach($products as $j => $product)
			    				@if($product->category_id == $category->id)
					    		<div class="col-sm-3 text-center">
					    			<img style="margin:15px; width: 200px;height: 160px" src=<?= "../" .$product->image ?>/>
					    			<button type="button" class="btn btn-primary" style="width: 90%"><?= $product->name?></button>
					    		</div>
					    		@endif
					    	@endforeach				    		
				    	</div>
	    			</div>

			@endforeach
	    </div>

    </div>

 @endsection