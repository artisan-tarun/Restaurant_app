<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;
use App\Cart;

class IndexController extends Controller
{
    public function index(){
        $title = 'Restaurant App | Home ';
        $popular = Item::inRandomOrder()->limit(12)->get();
        $categories = Category::with('items')->get();
        //$sessionList = session()->all();
        //return $sessionList;
        if(session()->has('cart')){
            $carts = new Cart(session()->get('cart'));
        }else{
            $carts = NULL;
        }
        //dd($carts->items);
        return view('welcome',compact('categories','popular','title','carts'));
    }
}
