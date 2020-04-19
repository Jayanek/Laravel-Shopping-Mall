<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index(){

        $userId = auth()->user()->id;
        $cartItems =\Cart::session($userId)->getContent();
        return view('cart',compact('cartItems'));
    }

    public function add(Product $product){

        \Cart::session(auth()->user()->id)->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        $userId = auth()->user()->id;
        $cartItems =\Cart::session($userId)->getContent();
        return view('cart',compact('cartItems'));

    }

    public function update($productId){

        $userId = auth()->user()->id;
        \Cart::session($userId)->update($productId, array(
            'quantity' => array(
                'relative' => false,
                'value' => \request('quantity')
            )
        ));

        return back();
    }

    public function destroy($productId){
        $userId = auth()->user()->id;
        \Cart::session($userId)->remove($productId);

        return back();
    }

    public function checkout(){
        return view('checkout');
    }
}
