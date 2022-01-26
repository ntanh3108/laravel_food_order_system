<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class voucherController extends Controller
{
    public function index(){
        return view('Backend.voucher.add');
    }

    public function save(Request $request){
        $voucher = new Voucher();
        $voucher->voucher_code = $request->voucher_code;
        $voucher->voucher_type = $request->voucher_type;
        $voucher->voucher_value = $request->voucher_value;
        $voucher->cart_min_value = $request->cart_min_value;
        $voucher->expired_on = $request->expired_on;
        $voucher->voucher_status = $request->voucher_status;
        $voucher->added_on = $request->added_on;
        $voucher->save();

        return back()->with('sms', 'Voucher Đã Được Thêm');
    }

    public function manage(){
        $vouchers = Voucher::all();

        return view('BackEnd.voucher.manage',compact('vouchers'));
    }

    public function active($voucher_id){
        $voucher = Voucher::find($voucher_id);
        $voucher->voucher_status = 1;
        $voucher->save();

        return back();
    }

    public function inactive($voucher_id){
        $voucher = Voucher::find($voucher_id);
        $voucher->voucher_status = 0;
        $voucher->save();

        return back();
    }

    public function delete($voucher_id){
        $voucher = voucher::find($voucher_id);
        $voucher->delete();

        return back();
    }

    public function update(Request $request){
        $voucher = voucher::find($request->voucher_id);
        $voucher->voucher_code = $request->voucher_code;
        $voucher->voucher_type = $request->voucher_type;
        $voucher->voucher_value = $request->voucher_value;
        $voucher->cart_min_value = $request->cart_min_value;
        $voucher->expired_on = $request->expired_on;
        $voucher->save();

        return redirect('/voucher/manage')->with('sms', 'Voucher Đã Được Chỉnh Sửa');
    }
}
