<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Shipping;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    public function index(){
        return view('FrontEnd.customer.register');
    }

    public function save(Request $request){
        $customer = new Customer();

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone_number = $request->phone_number;
        $customer->password = bcrypt($request->password);
        $customer->save();

        $data = $customer->toArray();

        /*Mail::send('FrontEnd.mail.mail',$data,function($message) use($data){
            $message->to($data['email']);
            $message->subject('Mlem Mlem Xin Chào!!!');
        });*/

        return redirect('/customer/login');
    }

    public function login(){
        return view('FrontEnd.customer.login');
    }

    public function check(Request $request){
        $customer = Customer::where('email', $request->email)->first();

        if(password_verify($request->password, $customer->password)){
            Session::put('customer_id', $customer->customer_id);
            Session::put('customer_name', $customer->name);
            return redirect('/category/food/show/1');
        }
        else{
            return redirect('/customer/login')->with('message','Mật Khẩu Sai');
        }
    }

    public function logout(){
        Session::forget('customer_id');
        Session::forget('customer_name');
        return redirect('/');
    }

    public function shipping(){
        $customer = Customer::find(Session::get('customer_id'));
        return view('FrontEnd.CheckOut.shipping',compact('customer'));
    }

    public function save_shipping(Request $request){
        $shipping = new Shipping();
        $shipping->name = $request->name;
        $shipping->email = $request->email;
        $shipping->phone_number = $request->phone_number;
        $shipping->address = $request->address;
        $shipping->save();

        Session::put('customer_name', $shipping->name);
        Session::put('shipping_id', $shipping->id);

        return redirect()->route('checkout_payment');
    }


}
