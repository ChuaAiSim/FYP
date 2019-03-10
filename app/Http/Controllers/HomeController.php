<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use Auth;
use App\CartItem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function editProfile($id)
    {
        $customer = User::find($id);

        if(!$customer){
            return view('home');
        }
        //return view('/layouts/admin');
        return view('/userPage/editProfile', [
            'customer' => $customer
        ]);        
    }

    public function updateProfile(Request $request, $id)
    {
        $customer = User::find($id);

        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->address1 = $request->address1;
        $customer->address2 = $request->address2;
        $customer->postcode = $request->postcode;
        $customer->city = $request->city;
        $customer->state = $request->state;
        $customer->phone = $request->phone;

        $customer->save();


        //return view('/layouts/admin');
        return redirect()->route('editProfile',[
            'id' => $customer->id
        ]);        
    }

    public function historyPurchase()
    {
        $orders = Order::where("user_id", Auth::user()->id)->orderby("date")->get();

        return view('/userPage/historyPurchase',[
            'orders' => $orders
        ]);
    }

    public function historyPurchaseDetails($orderId){

        $cartItems = CartItem::with('product')->where('order_id',$orderId)->get();
        //$order = Order::find($orderId);

        return view('/userPage/historyPurchaseDetails',[
            'cartItems' => $cartItems
        ]);
    }

    public function trackOrder(){

        $orders = Order::where('user_id','=', Auth::user()->id)
        ->where('status', '!=', 'completed')
        ->orderby("date")
        ->get();

        return view('/userPage/trackOrder',[
            'orders' => $orders

        ]);
    }
    public function trackOrderDetails($orderId){

        $cartItems = CartItem::with('product')->where('order_id',$orderId)->get();
        

        return view('/userPage/trackOrderDetails',[
            'cartItems' => $cartItems
        ]);
    }
}
