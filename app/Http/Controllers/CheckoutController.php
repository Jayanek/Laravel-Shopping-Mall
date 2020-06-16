<?php

namespace App\Http\Controllers;

use App\Mail\OrderCompleted;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\ExpressCheckout;

class CheckoutController extends Controller
{


    public function getCheckoutExpress($orderId){



        $provider = new ExpressCheckout();
        $response = $provider->setExpressCheckout($this->checkoutData($orderId));

        return redirect($response['paypal_link']);
    }

    public function checkoutData($orderId){

        $cart = \Cart::session(auth()->id());
        $data = [];
        $data['items'] = array_map(function ($item) {
            return [
                'name' => $item['name'],
                'price' => $item['price'],
                'qty' => $item['quantity']
            ];
        }, $cart->getContent()->toarray());


        $data['invoice_id'] = uniqid();
        $data['invoice_description'] = "description";
        $data['return_url'] = route('checkout.success',$orderId);
        $data['cancel_url'] = route('checkout.cancel');



        $data['total'] = $cart->getTotal();

        return $data;


    }

    public function getCheckoutExpressSuccess(Request $request,$orderId){

        $token = $request->get('token');
        $payerId = $request->get('PayerID');

        $provider = new ExpressCheckout();

        $response = $provider->getExpressCheckoutDetails($token);

        if($response["ACK"] == "Success" && $response["PAYERSTATUS"] == "verified")
            $payment_status = $provider->doExpressCheckoutPayment($this->checkoutData($orderId), $token, $payerId);



        if($payment_status["ACK"] == "Success" && $payment_status["PAYMENTINFO_0_ACK"] == "Success"){
           $order =  Order::find($orderId);
           $order->is_paid = true;
           $order->status = "completed";
           $order->save();

            Mail::to($order->user->email)->send(new OrderCompleted($order));

            \Cart::session(auth()->id())->clear();
            return redirect()->route('home')->withMessage('Order Placed successfully');
        }


        return redirect()->route('home')->withError('Error in Transaction');
    }
    public function getCheckoutExpressCancel(Request $request){
        return redirect()->route('home')->withError('Error in Transaction');
    }
}
