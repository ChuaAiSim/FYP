<?php

namespace App\Http\Controllers;

use \Auth;
use DateTime;
use DateTimeZone;
use App\User;
use App\Product;
use App\CartItem;
use App\Category;
use App\Order;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCreated;

class PaymentController extends Controller
{
    private $_api_context;

    public function __construct()
    {
		/** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
	}

	
	public function payWithpaypal(Request $request)
    {
         if(Auth::user() ==null){
            return redirect()->route('login');
        }

        $total =0;
        $uid = Auth::user()->id;
        $order = new Order();
        $order->user_id = $uid;
        $order->date = new DateTime();
        $order->date->setTimeZone(new DateTimeZone('Asia/Kuala_Lumpur'));
        $order->status = "pending";
        $order->phone = $request->phone;

        $shoppingCart =CartItem::with('product')->where("user_id",$uid)->get(); 
        foreach($shoppingCart as $cartItem)
        {   
            if($cartItem->size == "slide")
                $price = $cartItem->product->slide_price;
           else if($cartItem->size == "whole")
                $price = $cartItem->product->whole_price;

            $total += ($price * $cartItem->quantity);
            $product = Product::where('id', $cartItem->product_id)->first();
            $product->quantity-= $cartItem->quantity;
            $product->save();
        }

        $shippingtype = $request->deliverytype;
        if($shippingtype == "delivery")
        {    
            $order->deliverytype = 0;
            $order->address1 = $request->address1;
            $order->address2 = $request->address2;
            $order->city = $request->city;
            $order->state = $request->state;
            $order->postcode = $request->postcode;
            $order->notes = $request->notes;
            $total += 10;
        }
        else if ($shippingtype == "pickup")
        {   
            $order->deliverytype = 1; 
            $dt = $request->pickupdate . " " . $request->pickuptime;
            $datetime = DateTime::createFromFormat('Y-m-d H:i',$dt);
            $order->branch = $request->branch;

            $order->pickuptime = $datetime;
        }

        $order->amount = $total;
        $order->save();

        $cartItems = CartItem::where("user_id", $uid)->get();
        foreach($cartItems as $cartItem){
            $cartItem->order_id = $order->id;
            $cartItem->user_id = null;
            $cartItem->save();
        }
        
        $email = Auth::user()->email;
        //var_dump($email);
        Mail::to($email)->send(new OrderCreated($order));

    	$payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName('Item 1') /** item name **/
            ->setCurrency('MYR')
            ->setQuantity(1)
            ->setPrice($request->get('amount')); /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('MYR')
            ->setTotal($request->get('amount'));
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status')) /** Specify return URL **/
            ->setCancelUrl(URL::to('status'));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);

        } catch (PayPal\Exception\PayPalConnectionException $ex) {
        	var_dump($ex->getCode());
        	var_dump($ex->getData());
        	die($ex);

            if (\Config::get('app.debug')) {
                \Session::put('error', 'Connection timeout');
                return Redirect::to('/');
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::to('/');
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
        return Redirect()->route('checkout');
    }

	public function getPaymentStatus(){
		$payment_id = Session::get('paypal_payment_id');

		Session::forget('paypal_payment_id');

		if(empty(Input::get('PayerID')) || empty(Input::get('token'))){

			\Session::put('error', 'Payment failed');
			return Redirect::to('/historyPurchase');
		}

            \Session::put('success', 'Payment success');
            return Redirect::to('/historyPurchase');
	/*	try {
           $payment = Payment::get($payment_id, $this->_api_context);

        } catch (PayPal\Exception\PayPalConnectionException $ex) {
        	var_dump($ex->getCode());
        	var_dump($ex->getData());
        	die($ex);
        }
		
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment 
        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {
            \Session::put('success', 'Payment success');
            return Redirect::to('/historyPurchase');
        }
        \Session::put('error', 'Payment failed');
        return Redirect::to('/historyPurchase');*/
	}	
}
