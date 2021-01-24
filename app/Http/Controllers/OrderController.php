<?php

namespace App\Http\Controllers;

use App\Order;
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
            $order_array = Order::onlyTrashed()->get();
            $onlyTrashed = TRUE;
        }else{
            $order_array = Order::get();
            $onlyTrashed = FALSE;
        }
        $orders = $order_array->transform(function($cart , $key){
            return unserialize($cart->cart);
        });
        //dd($orders);
        /*foreach($orders as $order){
            foreach($order->items as $item){
                echo $item['id']."<br>";
            }
            echo "<hr>";
        }*/
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
    public function saveOrder(Order $order){
        
        $data = session()->get('cart');
        //dd($data);
        $order->user_id = Auth::user()->id;
        $order->cart = serialize($data);
        $order->quantity = $data->totalQty;
        $order->amount = $data->totalAmount;
        $order->status = 'New Order';
        $order->save();
        return back(); 
    }

    public function viewOrder(){
        return "view Order";
    }
}
