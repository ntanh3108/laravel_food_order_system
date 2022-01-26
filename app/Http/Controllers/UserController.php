<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('BackEnd.user.addUser');
    }

    public function save(Request $request){
        $staffs = new User();
        $staffs->name = $request->name;
        $staffs->email = $request->email;
        $staffs->password = bcrypt($request->password);
        $staffs->role = $request->role;
        $staffs->save();

        return back()->with('sms', 'Staff Đã Được Thêm');
    }

    public function manage(){
        $staffs = User::all();

        return view('BackEnd.user.manageUser',compact('staffs'));
    }

    public function update(Request $request){
        $staffs = User::find($request->id);
        $staffs->name = $request->name;
        $staffs->role = $request->role;
        $staffs->save();

        return redirect('/staff/manage')->with('sms', 'Staff Đã Được Chỉnh Sửa');
    }

    public function delete($id){
        $staff = User::find($id);
        $staff->delete();

        return back();
    }
}
