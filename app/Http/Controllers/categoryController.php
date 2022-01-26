<?php

namespace App\Http\Controllers;

use App\Models\category;
use Categories;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function index(){
        return view('BackEnd.category.addCategory');
    }

    public function save(Request $request){
        $category = new category();
        $category->category_name = $request->category_name;
        $category->order_number = $request->order_number;
        $category->added_on = $request->added_on;
        $category->category_status = $request->category_status;
        $category->save();

        return back()->with('sms', 'Danh Mục Đã Được Thêm');
    }

    public function manage(){
        $categories = category::all();

        return view('BackEnd.category.manageCategory',compact('categories'));
    }

    public function active($category_id){
        $category = category::find($category_id);
        $category->category_status = 1;
        $category->save();

        return back();
    }

    public function inactive($category_id){
        $category = category::find($category_id);
        $category->category_status = 0;
        $category->save();

        return back();
    }

    public function delete($category_id){
        $category = category::find($category_id);
        $category->delete();

        return back();
    }

    public function update(Request $request){
        $category = category::find($request->category_id);
        $category->category_name = $request->category_name;
        $category->order_number = $request->order_number;
        $category->save();

        return redirect('/category/manage')->with('sms', 'Danh Mục Đã Được Chỉnh Sửa');
    }
}
