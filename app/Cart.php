<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $items = [];
    public $totalQty;
    public $itemTotal;

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
    public function add($item){
        $itemArray = [
            'id' => $item->id,
            'title' => $item->title,
            'price' => $item->price,
            'qty' => 0,
            'image' => $item->image,
        ];
        if(!array_key_exists($item->id, $this->items)){
            $this->items [$item->id] = $itemArray;
            $this->totalQty++;
            $this->totalAmount += $item->price;
        }else{
            $this->totalQty++;
            $this->totalAmount+=$item->totalAmount;
        }
        $this->items[$item->id]['qty'] ++;
    }
}
