<?php

namespace App\Http\Controllers;

use \Auth;
use DateTime;
use App\User;
use App\Product;
use App\CartItem;
use App\Category;
use App\Order;
use Illuminate\Http\Request;

class OrderOnlineController extends Controller
{
    //
    public function index(){

        $products = Product::all();
        $categories = Category::all();

    	return view('/menuBar/orderOnline',[
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function getProduct($id){

        $product = Product::find($id);

        if(Auth::user() ==null){
            return redirect()->route('login');
        }

    	return view('/userPage/productDescription',[
            'product' => $product
        ]);
    }

    public function addCartItem(Request $request ,$id, $uid){

        if(Auth::user() ==null){
            return redirect()->route('login');
        }
        $product = Product::where('id', $id)->first();

        if($request->quantity >$product->quantity){
             return view('/userPage/productDescription',[
                    'product' => $product,
                    'error' => $product
                ]); 
        }

        $cartItem = new CartItem;
        $cartItem->product_id = $id;
        $cartItem->user_id = $uid;
        $cartItem->quantity = $request->quantity;
        $cartItem->size = $request->size;

        if($request->Cust =='notCustomize')
            $cartItem->isCustomize=0;
        else
            $cartItem->isCustomize=1;

        if($cartItem->isCustomize == 1)
        {   $cartItem->topping = $request->topping;
            $cartItem->flavor = $request->flavor;
            $cartItem->ingredient = $request->ingredient;
            $cartItem->creamFlavor = $request->creamFlavor;
            $cartItem->specialRequest = $request->specialRequest;}

        $cartItem->save();

        return redirect()->route('shoppingCart');
    }

    public function getShoppingCart(){

        if(Auth::user() ==null){
            return redirect()->route('login');
        }
        
        $uid = Auth::user()->id;

        $shoppingCart =CartItem::with('product')->where("user_id",$uid)->get();     


    	return view('/userPage/shoppingCart',[
            'shoppingCarts' => $shoppingCart
        ]);
    }

    public function deleteCartItem(Request $request, $id){


        if(Auth::user() ==null){
            return redirect()->route('login');
        }
        
        $cartItem = CartItem::find($id);
        if(!$cartItem) {
            return redirect()->route('shoppingCart');
        }

        $cartItem->delete();

        return redirect()->route('shoppingCart');
    }

    public function getCustomCake($id){

        if(Auth::user() ==null){
            return redirect()->route('login');
        }

        $product = Product::find($id);

    	return view('/userPage/customCake',[
            'product' => $product
        ]);
    }

    public function updateCustomCake(Request $request, $pid){

        if(Auth::user() ==null){
            return redirect()->route('login');
        }

        $cartItem = new CartItem;
        $cartItem->product_id = $pid;
        $cartItem->user_id = Auth::user()->id;
        $cartItem->quantity = $request->quantity;
        $cartItem->isCustomize = 1;
        $cartItem->topping =  $request->topping;
        $cartItem->flavor =  $request->flavor;
        $cartItem->ingredient =  $request->ingredient;
        $cartItem->creamFlavor =  $request->cream;
        $cartItem->specialRequest =  $request->specialRequest;
         $cartItem->size =  "whole";
        $cartItem->save();

        return redirect()->route("shoppingCart");
    }

    public function getCheckout(){

        if(Auth::user() ==null){
            return redirect()->route('login');
        }

         $uid = Auth::user()->id;

        $shoppingCarts =CartItem::with('product')->where("user_id",$uid)->get();

        foreach($shoppingCarts as $shoppingCart)
        {
            if($shoppingCart->quantity > $shoppingCart->product->quantity)    
                return view('/userPage/shoppingCart',[
                    'shoppingCarts' => $shoppingCarts,
                    'error' => $shoppingCart
                ]); 
        }

        return view('/userPage/checkout',[
            'shoppingCarts' => $shoppingCarts
        ]);
    }
}
