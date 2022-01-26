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

class ShipperOrderController extends Controller
{
    public function manage(){
        $orders = DB::table('orders')->join('customers','orders.customer_id','=','customers.customer_id')->join('payments','orders.order_id','=','payments.payment_id')->select('orders.*','customers.name','payments.payment_type','payments.payment_status')->get();
        return view('Shipper.order.manage',compact('orders'));
    }

    public function viewOrder($order_id){
        $order = Order::find($order_id);
        $customer = Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);
        $payment = Payment::where('order_id', $order->order_id)->first();
        $order_detail = Order_Detail::where('order_id', $order->order_id)->get();

        return view('Shipper.order.view_order', compact('order','customer', 'shipping', 'payment', 'order_detail'));
    }

    public function viewBill($order_id){
        $order = Order::find($order_id);
        $customer = Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);
        $payment = Payment::where('order_id', $order->order_id)->first();
        $order_detail = Order_Detail::where('order_id', $order->order_id)->get();
        return view('Shipper.order.view_order_bill', compact('order','customer', 'shipping', 'payment', 'order_detail'));
    }

    public function downloadBill($order_id){
        $order = Order::find($order_id);
        $customer = Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);
        $payment = Payment::where('order_id', $order->order_id)->first();
        $order_detail = Order_Detail::where('order_id', $order->order_id)->get();

        $pdf =  PDF::loadView('Shipper.order.download_bill',compact('order','customer', 'shipping', 'payment', 'order_detail'));

        return $pdf->stream('Bill.pdf');
    }

    public function deleteOrder($order_id){
        $order = Order::find($order_id);
        $order->delete();

        return back()->with('sms','Order Delete Successfully');
    }

    public function confirmOrder($order_id){
        $order = Order::find($order_id);
        DB::table('orders')->where('order_id',$order->order_id)->update(['order_status'=>"Giao Thành Công"]);
        DB::table('payments')->where('order_id',$order->order_id)->update(['payment_status'=>"Đã Thanh Toán"]);
        return redirect('shipper/order/manage');
    }

    public function refuseOrder($order_id){
        $order = Order::find($order_id);
        DB::table('orders')->where('order_id',$order->order_id)->update(['order_status'=>"Đơn Hàng Bị Bom"]);
        DB::table('payments')->where('order_id',$order->order_id)->update(['payment_status'=>"Đơn Hàng Bị Bom"]);
        return redirect('shipper/order/manage');
    }
}
