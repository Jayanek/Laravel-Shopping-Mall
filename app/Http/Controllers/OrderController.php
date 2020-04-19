<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([

        'shipping_fullname' => 'required' ,
        'shipping_address'=> 'required',
        'shipping_city'=> 'required' ,
        'shipping_state'=> 'required' ,
        'shipping_zipcode'=> 'required' ,
        'shipping_phone'=> 'required'

        ]);

        $order = new Order();

        $order->order_number = uniqid('order_number');

        $order->shipping_fullname = $request->input('shipping_fullname');
        $order->shipping_address = $request->input('shipping_address');
        $order->shipping_city = $request->input('shipping_city');
        $order->shipping_state= $request->input('shipping_state');
        $order->shipping_zipcode = $request->input('shipping_zipcode');
        $order->shipping_phone = $request->input('shipping_phone');

        $order->billing_fullname = $request->input('shipping_fullname');
        $order->billing_address = $request->input('shipping_address');
        $order->billing_city = $request->input('shipping_city');
        $order->billing_state= $request->input('shipping_state');
        $order->billing_zipcode = $request->input('shipping_zipcode');
        $order->billing_phone = $request->input('shipping_phone');

        $order->user_id = auth()->user()->id;
        $order->grand_total = \Cart::session(auth()->user()->id)->getTotal();
        $order->item_count = \Cart::session(auth()->user()->id)->getContent()->count();

        $order->save();

        $item_list = \Cart::session(auth()->user()->id)->getContent();

        foreach ($item_list as $item){
            $order->items()->attach($item->id,['price' => $item->price,'quantity' => $item->quantity]);
        }



        return 'succeess';

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
}
