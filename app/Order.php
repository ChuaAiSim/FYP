<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function cartItems(){
    	return $this->hasMany('App\CartItem');
    }
}
