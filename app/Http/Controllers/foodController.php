<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Support\Facades\DB;
use App\Models\Food;
use Illuminate\Http\Request;


class foodController extends Controller
{
    public function index(){
        $categories = category::where('category_status',1)->get();
        return view('Backend.food.add',compact('categories'));
    }

    public function save(Request $request){
        $imgName = $request->file('food_image');
        $image = $imgName->getClientOriginalName();
        $direct = 'BackEndSourcefile/food_img/';
        $imgURL = $direct.$image;
        $imgName->move($direct,$image);

        $food = new Food();
        $food->food_name = $request->food_name;
        $food->category_id = $request->category_id;
        $food->food_detail = $request->food_detail;
        $food->food_image = $imgURL;
        $food->food_status = $request->food_status;
        $food->added_on = $request->added_on;
        $food->price_size_m = $request->price_size_m;
        $food->price_size_l = $request->price_size_l;
        $food->save();

        return back()->with('sms', 'Món Ăn Đã Được Thêm');
    }

    public function manage(){
        /*$food = Food::all();*/
        $food = DB::table('food')->join('categories','food.category_id','=','categories.category_id')->select('food.*','categories.category_name')->get();
        $categories = category::where('category_status',1)->get();

        return view("Backend.food.manage",compact('food', 'categories'));
    }

    public function active($food_id){
        $food   = Food::find($food_id);
        $food->food_status = 1;
        $food->save();

        return back();
    }

    public function inactive($food_id){
        $food = Food::find($food_id);
        $food->food_status = 0;
        $food->save();

        return back();
    }

    public function delete($food_id){
        $food = Food::find($food_id);
        $food->delete();

        return back();
    }

    public function update(Request $request){
        $food = Food::find($request->food_id);
        $img_now = $request->file('food_image');

        if($img_now){
            $image_name = $img_now->getClientOriginalName();
            $direct = 'BackEndSourcefile/food_img/';
            $imgURL = $direct.$image_name;
            $img_now->move($direct,$image_name);

            $old_img = $food->food_image;

            if(file_exists($old_img)){
                unlink($old_img);
            }

            $food->food_name = $request->food_name;
            $food->food_id = $request->food_id;
            $food->food_detail = $request->food_detail;
            $food->food_image = $imgURL;
            $food->price_size_m = $request->price_size_m;
            $food->price_size_l = $request->price_size_l;
        }

        else{
            $food->food_name = $request->food_name;
            $food->food_id = $request->food_id;
            $food->food_detail = $request->food_detail;
            $food->price_size_m = $request->price_size_m;
            $food->price_size_l = $request->price_size_l;
        }
        $food->save();

        return redirect('/food/manage')->with('sms', 'Món Ăn Đã Được Chỉnh Sửa');
    }

}
