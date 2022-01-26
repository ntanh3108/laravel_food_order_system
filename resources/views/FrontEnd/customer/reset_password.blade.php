@extends('FrontEnd.master')

@section('title')
    Đổi Mật Khẩu
@endsection

@section('content')
<script>
	function hideError(){
		let e = document.getElementById("error");
		e.style.display = 'none';
	}

	function hideError1(){
		let e = document.getElementById("error1");
		e.style.display = 'none';
	}

	function displayError(message){
		let e = document.getElementById("error");
		e.style.display = '';
		e.innerHTML = message;
		e.style.color = red;
	}

	function displayError1(message){
		let e = document.getElementById("error1");
		e.style.display = '';
		e.innerHTML = message;
		e.style.color = red;
	}

	function checkInput(){
		try{
			let passBox = document.getElementById("password");
			let repassBox = document.getElementById("re_password");
			let passValue = passBox.value;
			let repassValue = repassBox.value;
			let strongRegex = "^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})";

			if(passValue.length==0 && passValue.length<8) {
				displayError('Mật khẩu tối thiểu 8 ký tự');
				passBox.focus();
			}

			else if(!passValue.match(strongRegex)){
				displayError('Mật khẩu cần có A-Z, a-z, số và ký tự đặc biệt');
				passBox.focus();
			}

			else if(passValue != repassValue){
				displayError1("Mật khẩu viết lại không trùng khớp");
				repassBox.focus();
			}

			else{
				return true;
			}

			return false;
		}

		catch (e){
			return false;
		}
	}

	window.onload = function(){
		hideError();
		hideError1();
	}
</script>
<div class="login-page about">
    <img class="login-w3img" src="{{asset('/')}}FrontEndSourceFile/images/img3.jpg" alt="">
    <div class="container">
        <h3 class="w3ls-title w3ls-title1">Đổi Mật Khẩu</h3>
        <div class="login-agileinfo">
            <form action="{{route('change_password')}}" method="post">
            @csrf
                <input class="hidden" type="text" name="email" value="{{$customer->email}}">
                <input class="agile-ltext" type="password" name="password" id="password" placeholder="Mật Khẩu" required="">
                <p id="error" style="margin-top: -10px;margin-left: 40px;margin-bottom: 20px; color: red; font-weight: bold;">Error message will be here</p>

                <input class="agile-ltext" type="password" name="re_password" id="re_password" placeholder="Xác Nhận Mật Khẩu" required="">
                <p id="error1" style="margin-top: -10px;margin-left: 40px;margin-bottom: 20px; color: red; font-weight: bold;">Error message will be here</p>
                <div class="wthreelogin-text">
                    <div class="clearfix"> </div>
                </div>
                <button type="submit" class="btn btn-success" style="vertical-align: middle" name="register" onclick="return checkInput()"><span>Xác Nhận</span></button>
            </form>
        </div>
    </div>
</div>
@endsection