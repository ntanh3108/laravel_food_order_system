<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;


class cartController extends Controller
{
    public function add(Request $request){
        $food = Food::where('food_id',$request->food_id)->first();
        $isChecked = $request->get('price_size_l');

        if($isChecked != null){
            $price = $food->price_size_l;
        }
        else{
            $price = $food->price_size_m;
        }

        Cart::add([
            'id' => $request->food_id,
            'qty' => $request->qty,
            'name' => $food->food_name,
            'price' => $price,
            'weight'=>550,
            'options' =>
            [
                'image' => $food->food_image,
            ],
        ]);

        return redirect()->route('cart_show')->with('');
    }

    public function show(){
        $foodCart = Cart::content();

        return view('FrontEnd.cart.show',compact('foodCart'));
    }

    public function remove($id){
        Cart::remove($id);
        return back();
    }

    public function update(Request $request){
        Cart::update($request->rowId, $request->qty);
        return back();
    }

    public function voucher(Request $request){
        $voucher = Voucher::where('voucher_code',$request->voucher_code)->first();

        if(!$voucher){
            return back()->with('Error','Không có mã giảm giá này');
        }

        Session::put('voucher_value',$voucher->voucher_value);
        return redirect('cart/show');
    }
}
