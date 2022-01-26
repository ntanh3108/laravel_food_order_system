@extends('FrontEnd.master')
@section('title')
    Trang Chủ
@endsection

@section('content')
     <!-- add-products -->
     <div class="add-products">
        <div class="container">
            <div class="add-products-row">
                <div class="w3ls-add-grids">
                    <a href="menu.html">
                        <h4>Nhập Mã QUAMON10Đ Sale Ngay<span>20000đ<br></span></h4>
                        <h5>Mua Ngay Mua Ngay</h5>
                        <h6>Order Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
                    </a>
                </div>
                <div class="w3ls-add-grids w3ls-add-grids-right">
                    <a href="menu.html">
                        <h4>Tưng Bừng Khai Trương<span><br>Xin Chào</span></h4>
                        <h5>Mlem Mlem Ngay</h5>
                        <h6>Order Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
                    </a>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //add-products -->
    <!-- order -->
    <div class="wthree-order">
        <img src="{{asset('/')}}FrontEndSourceFile/images/i2.jpg" class="w3order-img" alt="" />
        <div class="container">
            <h3 class="w3ls-title">Làm Thế Nào Để Đặt Món?</h3>
            <p class="w3lsorder-text">Chỉ qua 4 bước đơn giản</p>
            <div class="order-agileinfo">
                <div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids">
                    <div class="order-w3text">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <h5>Tìm Kiếm</h5>
                        <span>1</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids">
                    <div class="order-w3text">
                        <i class="fa fa-check" aria-hidden="true"></i>
                        <h5>Chọn Món</h5>
                        <span>2</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids">
                    <div class="order-w3text">
                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                        <h5>Thanh Toán</h5>
                        <span>3</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids">
                    <div class="order-w3text">
                        <i class="fa fa-cutlery" aria-hidden="true"></i>
                        <h5>Thưởng Thức</h5>
                        <span>4</span>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //order -->
    <!-- deals -->
    <div class="w3agile-deals">
        <div class="container">
            <h3 class="w3ls-title">Special Services</h3>
            <div class="dealsrow">
                <div class="col-md-6 col-sm-6 deals-grids">
                    <div class="deals-left">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                    </div>
                    <div class="deals-right">
                        <h4>FREE DELIVERY</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus justo ac </p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="col-md-6 col-sm-6 deals-grids">
                    <div class="deals-left">
                        <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                    </div>
                    <div class="deals-right">
                        <h4>Party Orders</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus justo ac </p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="col-md-6 col-sm-6 deals-grids">
                    <div class="deals-left">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                    <div class="deals-right">
                        <h4>Team up Scheme</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus justo ac </p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="col-md-6 col-sm-6 deals-grids">
                    <div class="deals-left">
                        <i class="fa fa-building" aria-hidden="true"></i>
                    </div>
                    <div class="deals-right">
                        <h4>corporate orders</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus justo ac </p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //deals -->
    <!-- dishes -->
    <div class="w3agile-spldishes">
        <div class="container">
            <h3 class="w3ls-title">Special Foods</h3>
            <div class="spldishes-agileinfo">
                <div class="col-md-3 spldishes-w3left">
                    <h5 class="w3ltitle">-Jack Lee-</h5>
                    <p>Món quà lớn nhất người đầu bếp có được là sự hài lòng của thực khách.</p>
                </div>
                <div class="col-md-9 spldishes-grids">
                    <!-- Owl-Carousel -->
                    <div id="owl-demo" class="owl-carousel text-center agileinfo-gallery-row">
                        @foreach ($food as $fd)
                        <a href="{{route('category_food',['category_id'=>$fd->category_id])}}" class="item g1">
                            <img class="lazyOwl" src="{{$fd->food_image}}" style="height:188px; width:285px"/>
                            <div class="agile-dish-caption">
                                <h4>{{$fd->food_name}}</h4>
                            </div>
                        </a>
                        @endforeach

                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //dishes -->
@endsection