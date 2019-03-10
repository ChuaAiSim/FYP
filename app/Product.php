<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function cartItems(){
    	return $this->hasMany('App\CartItem');
    }

    public function category(){
    	return $this->belongsTo(Category::class);
    }
}
