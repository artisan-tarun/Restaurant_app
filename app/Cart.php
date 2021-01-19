<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $items = [];
    public $totalQty;
    public $totalAmount;

    public function __construct($cart = NULL)
    {
        if($cart){
            $this->items = $cart->items;
            $this->totalQty = $cart->totalQty;
            $this->totalAmount = $cart->totalAmount;
        }else{
            $this->items = [];
            $this->totalQty = 0;
            $this->totalAmount = 0;
        }
    }
}
