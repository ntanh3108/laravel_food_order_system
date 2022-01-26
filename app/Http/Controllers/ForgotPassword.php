<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ForgotPassword extends Controller
{
    public function forgot(){
        return view('FrontEnd.customer.forgot_password');
    }

    public function password(Request $request){
        $customer = Customer::where('email',$request->email)->first();
        $data = $customer->toArray();

        Mail::send('FrontEnd.mail.reset_password',$data,function($message) use($data){
            $message->to($data['email']);
            $message->subject('Email reset password');
        });
    }

    public function reset($email){
        $customer = Customer::where('email',$email)->first();
        return view('FrontEnd.customer.reset_password',compact('customer'));
    }

    public function change(Request $request){
        $password = bcrypt($request->password);

        DB::table('customers')->where('email',$request->email)->update(['password'=>$password]);

        return redirect('/customer/login');
    }
}
