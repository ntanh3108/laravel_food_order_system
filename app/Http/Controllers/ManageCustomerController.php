<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class ManageCustomerController extends Controller
{
    public function manage(){
        $customer = Customer::all();

        return view('BackEnd.customer.manageCustomer',compact('customer'));
    }

    public function delete($customer_id){
        $customer = Customer::find($customer_id);
        $customer->delete();

        return back();
    }
}
