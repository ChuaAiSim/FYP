<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //
    public function index(){

    	$product = Product::all();
    	$category = Category::all();

    	return view('/menuBar/menu',[
    		'products' => $product,
    		'categories' => $category
    	]);
    }
}
