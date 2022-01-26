@extends('FrontEnd.master')

@section('title')
    Đăng Nhập
@endsection

@section('content')
    <!-- sign up-page -->
	<div class="login-page about">
		<img class="login-w3img" src="{{asset('/')}}FrontEndSourceFile/images/img3.jpg" alt="">
		<div class="container">
			<h3 class="w3ls-title w3ls-title1">Đăng Nhập</h3>
			<div class="login-agileinfo">
				<form action="{{route('check_login')}}" method="post">
                @csrf
					<input class="agile-ltext" type="email" name="email" placeholder="Email Của Bạn" required="">
					<input class="agile-ltext" type="password" name="password" placeholder="Password" required="">

					<div class="wthreelogin-text">
						<a class="agile-ltext" href="{{url('/forgot_password')}}">Forgot Password</a>
						<div class="clearfix"> </div>
					</div>
					<input type="submit" value="Đăng Nhập">
				</form>
                <strong class="text-center" style="color: red">{{Session::get('message')}}</strong>
			</div>
		</div>
	</div>
	<!-- //sign up-page -->
@endsection