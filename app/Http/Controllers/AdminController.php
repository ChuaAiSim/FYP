<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\User;
use App\Admin;
use App\Product;
use App\CartItem;
use App\Order;
use App\Category;
use Illuminate\Http\Request;
use File;
class AdminController extends Controller
{
    //
    public function index(){

    	return view('dashboard');
    }
    public function checkAdminLogin(Request $request){
        
        $admin = Admin::first();

        if($admin->email == $request->email && Hash::check($request->password,$admin->password)){
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('adminLogin');
        }
    }

    public function adminLogin(){


        return view('/adminPage/adminLogin');
    }

     public function getCustomerInfo(){
    	//return view('/layouts/admin');
        $user = User::all();

    	return view('/adminPage/customerInfo',[
            'users' => $user
        ]);
    }

    public function getOrders(){
    	
        $orders = Order::with('cartItems')->orderby("date")->get();

        //go back to stock list 
        return view('/adminPage/orders',[
            'orders' => $orders
        ]);

    }

    public function orderDetails($id){

        $cartItems = CartItem::with('product')->where('order_id',$id)->get();
        $order = Order::find($id);
        $user = User::find($order->user_id);

        return view('/adminPage/orderDetails',[
            'cartItems' => $cartItems,
            'order' => $order,
            'user' =>$user
        ]);
    }

    public function updateOrders(Request $request, $id){
        //return view('/layouts/admin');
        $order = Order::find($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('orders');
    }


    public function getStocks(){ 	
    	
        $products = Product::with('category')->get();

        //go back to stock list 
        return view('/adminPage/stocks',[
            'products' => $products
        ]);
    }

    public function addStock(Request $request){

        // create function
        $product = new Product;

        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category;
        $product->slide_price = $request->priceSlide;
        $product->whole_price = $request->priceWhole;
        
        $product->status = $request->status;
        $product->description = $request->description;

        $file = $request->file('pic');
        $name = str_replace(' ', '_', $file->getClientOriginalName());
        $file->move("upload",$name);

        
        $product->image = "upload/" . $name;

        $product->save();

        return redirect()->route('stocks');
    }

    public function updateStock(Request $request, $id){

        // create function
        $product = Product::find($id);

        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category;
        $product->slide_price = $request->priceSlide;
        $product->whole_price = $request->priceWhole;
        
        $product->status = $request->status;
        $product->description = $request->description;
        if($request->file('pic') != null)
        {   
            File::delete($product->image);
            $file = $request->file('pic');
            $name = str_replace(' ', '_', $file->getClientOriginalName());
            $file->move("upload",$name);           
            $product->image = "upload/" . $name;
        }
        //var_dump($request->file('pic'));
        $product->save();
        //go back to stock list 
        return redirect()->route('stocks');
    }

    public function getEditStocksDetails($id){

        $product = Product::find($id);

        //return view('/layouts/admin');
        return view('/adminPage/editStocksDetails', [
            'product' => $product
        ]);
    }

    public function deleteStock(Request $request, $id){

        // create function
        $product = Product::find($id);

        if(!$product) {
            return redirect()->route('stocks');
        }
        if($request->file('pic') != null)
            File::delete($product->image);

        $product->delete();

        return redirect()->route('stocks');
    }

    public function getCategories(){

        $categories = Category::all();
    	//return view('/layouts/admin');
    	return view('/adminPage/categories',[
            'categories' => $categories
        ]);
    }

    public function getSalesReport(){
    	//return view('/layouts/admin');
    	return view('/adminPage/salesReport');
    }

    public function getProductsReport(){
    	//find cart item got order id 
        //group by product id 
  /*      $cartItems = CartItem::all();
        foreach($cartItems as $cartItem){


        }
    	return view('/adminPage/productReport');*/
    }

}
