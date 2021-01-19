<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;

class IndexController extends Controller
{
    public function index(){
        $popular = Item::inRandomOrder()->limit(12)->get();
        $categories = Category::with('items')->get();
        return view('welcome',compact('categories','popular'));
    }
}
