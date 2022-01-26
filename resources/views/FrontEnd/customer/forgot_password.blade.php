@extends('FrontEnd.master')

@section('title')
    Forgot Password
@endsection

@section('content')
<div class="login-page about">
    <img class="login-w3img" src="{{asset('/')}}FrontEndSourceFile/images/img3.jpg" alt="">
    <div class="container">
        <h3 class="w3ls-title w3ls-title1">Đăng Nhập</h3>
        <div class="login-agileinfo">
            <form action="{{url('/forgot_password')}}" method="post">
            @csrf
                <input class="agile-ltext" type="email" name="email" placeholder="Email Của Bạn" required="">
                <div class="wthreelogin-text">
                    <div class="clearfix"> </div>
                </div>
                <input type="submit" value="Xác Nhận">
            </form>
        </div>
    </div>
</div>
@endsection