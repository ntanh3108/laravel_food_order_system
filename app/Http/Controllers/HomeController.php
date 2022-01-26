<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller{

  public function index(){
    $role = Auth::user()->role;

    if($role==1){
      return view('BackEnd.Home.index');
    }

    elseif($role == 2){
      return view('Manager.Home.index');
    }

    else{
      return view('Shipper.Home.index');
    }

  }
}

?>