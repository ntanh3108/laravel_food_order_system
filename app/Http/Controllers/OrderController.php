<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Payment;
use App\Models\Shipping;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;


class OrderController extends Controller
{

    public function manage(){
        $orders = DB::table('orders')->join('customers','orders.customer_id','=','customers.customer_id')->join('payments','orders.order_id','=','payments.payment_id')->select('orders.*','customers.name','payments.payment_type','payments.payment_status')->get();
        return view('BackEnd.Order.manage',compact('orders'));
    }

    public function viewOrder($order_id){
        $order = Order::find($order_id);
        $customer = Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);
        $payment = Payment::where('order_id', $order->order_id)->first();
        $order_detail = Order_Detail::where('order_id', $order->order_id)->get();

        return view('BackEnd.Order.view_order', compact('order','customer', 'shipping', 'payment', 'order_detail'));
    }

    public function viewBill($order_id){
        $order = Order::find($order_id);
        $customer = Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);
        $payment = Payment::where('order_id', $order->order_id)->first();
        $order_detail = Order_Detail::where('order_id', $order->order_id)->get();
        return view('BackEnd.Order.view_order_bill', compact('order','customer', 'shipping', 'payment', 'order_detail'));
    }

    public function downloadBill($order_id){
        $order = Order::find($order_id);
        $customer = Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);
        $payment = Payment::where('order_id', $order->order_id)->first();
        $order_detail = Order_Detail::where('order_id', $order->order_id)->get();

        $pdf =  PDF::loadView('BackEnd.order.download_bill',compact('order','customer', 'shipping', 'payment', 'order_detail'));

        return $pdf->stream('Bill.pdf');
    }

    public function deleteOrder($order_id){
        $order = Order::find($order_id);
        $order->delete();

        return back()->with('sms','Order Delete Successfully');
    }

}
