<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Payment;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckOutController extends Controller
{

    public function payment(){
        return view('FrontEnd.CheckOut.checkout_payment');
    }

    public function order(Request $request){
        $payment_type = $request->payment_type;

        if($payment_type == 'Tại Nhà'){
            $order = new Order();
            $order->customer_id = Session::get('customer_id');
            $order->shipping_id = Session::get('shipping_id');
            $order->order_total = Session::get('sum');
            $order->save();

            $payment = new Payment();
            $payment->order_id = $order->order_id;
            $payment->payment_type = $payment_type;
            $payment->save();

            $cartFood = Cart::content();

            foreach($cartFood as $cart){
                $orderDetail = new Order_Detail();
                $orderDetail->order_id = $order->order_id;
                $orderDetail->food_id = $cart->id;
                $orderDetail->food_name = $cart->name;
                $orderDetail->food_price = $cart->price;
                $orderDetail->food_qty = $cart->qty;
                $orderDetail->save();
            }

            Cart::destroy();
            return redirect('/checkout/order/complete');
        }

    }

    public function complete(){
        return view('FrontEnd.checkout.order_complete');
    }
}
