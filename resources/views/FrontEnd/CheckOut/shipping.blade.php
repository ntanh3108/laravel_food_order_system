@extends('FrontEnd.master')

@section('title')
    Thông Tin Giao Hàng
@endsection

@section('content')
      <!-- sign up-page -->
	<div class="login-page about">
		<img class="login-w3img" src="{{asset('/')}}FrontEndSourceFile/images/img3.jpg" alt="">
		<div class="container">
			<h3 class="w3ls-title w3ls-title1">Nhập Thông Tin Giao Hàng Của Bạn</h3>
			<div class="login-agileinfo">
				<form action="{{route('save_shipping')}}" method="post">
                @csrf
					<input class="agile-ltext" type="text" name="name" placeholder="Nhập Tên Của Bạn" value="{{$customer->name}}">
					<input class="agile-ltext" type="email" name="email" placeholder="Email Của Bạn" value="{{$customer->email}}">
                    <input class="agile-ltext" type="text" name="phone_number" placeholder="SDT Của Bạn" value="{{$customer->phone_number}}">
					<input class="agile-ltext" type="text" name="address" placeholder="Địa Chỉ Giao Hàng" required="">

					<div class="wthreelogin-text">
						<div class="clearfix"> </div>
					</div>
					<input type="submit" value="Xác Nhận">
				</form>
			</div>
		</div>
	</div>
	<!-- //sign up-page -->
@endsection