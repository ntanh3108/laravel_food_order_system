<div class="banner">
    <!-- header -->
    <div class="header">
        <div class="w3ls-header">
            <!-- header-one -->
            <div class="container">
                <div class="w3ls-header-left">
                    <p>TƯNG BỪNG KHAI TRƯƠNG NHẬP MÃ QUAMON21 ĐỂ GIẢM 20000Đ</p>
                </div>
                <div class="w3ls-header-right">
                    <ul>

                        @if (Session::get('customer_id'))
                            <li class="head-dpdn">
                                <i class="fa fa-user-plus" aria-hidden="true"></i>{{Session::get('customer_name')}}
                            </li>
                        @else
                            <li class="head-dpdn">
                                <a href="{{route('sign_up')}}"><i class="fa fa-user-plus" aria-hidden="true"></i>Đăng Ký</a>
                            </li>
                        @endif

                        @if (Session::get('customer_id'))
                            <li class="head-dpdn">
                                <a href="#" onclick="document.getElementById('customerLogout').submit()"><i class="fa fa-sign-in" aria-hidden="true"></i>Đăng Xuất</a>
                                <form action="{{route('log_out')}}" id="customerLogout" method="POST">
                                @csrf
                                </form>
                            </li>
                        @else
                            <li class="head-dpdn">
                                <a href="{{route('login_customer')}}"><i class="fa fa-sign-in" aria-hidden="true"></i>Đăng Nhập</a>
                            </li>
                        @endif

                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!-- //header-one -->
        <!-- navigation -->
        <div class="navigation agiletop-nav">
            <div class="container">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header w3l_logo">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <h1><a href="{{url('/')}}">MlemMlem<span>Nơi Đồ Ăn Ngon Hơn NYC Của Bạn!</span></a></h1>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{url('/category/food/show/1')}}">Menu</a></li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="https://m.me/tuananh.ng.3108" target="blank">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="cart cart box_1">
                        <a href="{{route('cart_show')}}"  class="last">
                            <button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
                        </a>
                    </div>
                </nav>
            </div>
        </div>
        <!-- //navigation -->
    </div>
    <!-- //header-end -->
    <!-- banner-text -->
    <div class="banner-text">
        <div class="container">
            <h2>Gửi Yêu Thương Trong Từng Món Ăn<br> <span></span></h2>
            <div class="agileits_search">
                <form action="{{route('search_food')}}" method="post">
                    @csrf
                    <input name="key" type="text" placeholder="Tìm món ăn mà bạn muốn" required="">
                    <input type="submit" value="Search">
                </form>
            </div>
        </div>
    </div>
</div>