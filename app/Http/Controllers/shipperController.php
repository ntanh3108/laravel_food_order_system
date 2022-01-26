<?php

namespace App\Http\Controllers;

use App\Models\Shipper;
use Illuminate\Http\Request;

class shipperController extends Controller
{
    public function index(){
        return view('BackEnd.shipper.add');
    }

    public function save(Request $request){
        $shipper = new Shipper();
        $shipper->shipper_name = $request->shipper_name;
        $shipper->shipper_phone_number = $request->shipper_phone_number;
        $shipper->shipper_password = $request->shipper_password;
        $shipper->added_on = $request->added_on;
        $shipper->shipper_status = $request->shipper_status;
        $shipper->save();

        return back()->with('sms', 'Shipper Đã Được Thêm');
    }

    public function manage(){
        $shippers = Shipper::all();

        return view('BackEnd.shipper.manage',compact('shippers'));
    }

    public function active($shipper_id){
        $shipper = Shipper::find($shipper_id);
        $shipper->shipper_status = 1;
        $shipper->save();

        return back();
    }

    public function inactive($shipper_id){
        $shipper = Shipper::find($shipper_id);
        $shipper->shipper_status = 0;
        $shipper->save();

        return back();
    }

    public function delete($shipper_id){
        $shipper = Shipper::find($shipper_id);
        $shipper->delete();

        return back();
    }

    public function update(Request $request){
        $shipper = shipper::find($request->shipper_id);
        $shipper->shipper_name = $request->shipper_name;
        $shipper->shipper_phone_number = $request->shipper_phone_number;
        $shipper->save();

        return redirect('/shipper/manage')->with('sms', 'Shipper Đã Được Chỉnh Sửa');
    }
}
