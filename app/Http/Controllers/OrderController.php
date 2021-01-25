<?php

namespace App\Http\Controllers;

use App\Order;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Admin | orders';
        $status = $request->get('status');
        if($status == 'trash'){
            $orders = Order::onlyTrashed()->get();
            $onlyTrashed = TRUE;
        }else{
            $orders = Order::get();
            $onlyTrashed = FALSE;
        }
        /*$orders = $order_array->transform(function($cart , $key){
            return unserialize($cart->cart);
        });*/
        //dd($orders);
        /*foreach($orders as $order){
            foreach($order->items as $item){
                echo $item['id']."<br>";
            }
            echo "<hr>";
        }*/
        /*foreach($order->items as $abc)
                                  {{ $abc['title']}} : {{ $abc['qty']}} <br>
                            @endforeach
                            <hr>
                            {{ $order->totalAmount }}
                        </td>*/
        return view('admin.order.index',compact('orders','title','onlyTrashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
    public function saveOrder(Order $order,Cart $cart){
        
        $data = session()->get('cart');
        //dd($data);
        $order->user_id = Auth::user()->id;
        $order->status = 'New Order';
        $order->save();

        $cart->order_id = $order->id;
        $cart->cart_details = serialize($data);
        $cart->save();
        
        return back(); 
    }

    public function viewOrder(){
        return "view Order";
    }
}
