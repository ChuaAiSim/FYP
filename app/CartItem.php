<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{

    protected $table = 'CartItems';
    //
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function product(){
    	return $this->belongsTo('App\Product');
    }

    public function order(){
    	return $this->belongsTo('App\Order');
    }
}
