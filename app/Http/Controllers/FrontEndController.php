<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Food;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){

        $food = Food::where('food_status',1)->get();
        return view('FrontEnd.include.home',compact('food'));
    }

    public function food_show($id){
        $food = Food::where('category_id',$id)->where('food_status',1)->get();
        return view('FrontEnd.include.food',compact('food'));
    }

    public function search(Request $request){
        $food = Food::where('food_name', 'like', '%'.$request->key.'%')->get();
        return view('FrontEnd.search.search',compact('food'));
    }
}
