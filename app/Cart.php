<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use SoftDeletes;
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
            $this->totalAmount+= $this->totalAmount;
        }
        $this->items[$item->id]['qty'] ++;
    }
    public function updateQty($id, $qty){
        $this->totalQty-=$this->items[$id]['qty'];
        $this->totalAmount-=$this->items[$id]['price']*$this->items[$id]['qty'];
        // update new quantity
        $this->items[$id]['qty'] = $qty;
        $this->totalQty+=$qty;
        $this->totalAmount+=$this->items[$id]['price']*$this->items[$id]['qty'];
    }

    public function removeItem($id){
        if(array_key_exists($id,$this->items)){
            $this->totalQty-=$this->items[$id]['qty'];
            $this->totalAmount-=$this->items[$id]['price']*$this->items[$id]['qty'];
            unset($this->items[$id]);
        }
    }

    public function order(){
        return $this->belongsTo(Cart::class);
    }
}
