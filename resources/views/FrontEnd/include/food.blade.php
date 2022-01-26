<!-- products -->
@extends('FrontEnd.master')
@section('title')
    Món Ăn
@endsection

@section('content')
<div class="products">
    <div class="container">
        <div class="col-md-9 product-w3ls-right">
            <div class="product-top">
                <h4>Món Ăn</h4>
                <div class="clearfix"> </div>
            </div>

            <div class="products-row">
                @foreach ($food as $fd)
                <div class="col-xs-6 col-sm-4 product-grids">
                    <div class="flip-container">
                        <div class="flipper agile-products">
                            <div class="front">
                                <img src="{{asset($fd->food_image)}}" class="img-responsive" alt="img" style="width: 277px; height: 182px;">
                                <div class="agile-product-text">
                                    <h5>{{$fd->food_name}}</h5>
                                </div>
                            </div>
                            <div class="back">
                                <h4>{{$fd->food_name}}</h4>

                                <h6>Vừa: {{$fd->price_size_m}}<sup>Đ</sup></h6>

                                @if ($fd->price_size_l==null)

                                @else
                                <h6>Lớn: {{$fd->price_size_l}}<sup>Đ</sup></h6>
                                @endif

                                <form action="{{route('add_to_cart')}}" method="post">
                                    <input type="hidden" name="food_id" value="{{$fd->food_id}}">
                                    <a href="#" data-toggle="modal" data-target="#myModal1{{$fd->food_id}}">
                                        Xem Thêm<span class="w3-agile-line"></span><i class="fa fa-cart-plus" aria-hidden="true"></i>Giỏ Hàng
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- modal -->
<div class="modal video-modal fade" id="myModal1{{$fd->food_id}}" tabindex="-1" role="dialog" aria-labelledby="myModal1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <section>
                <div class="modal-body">
                    <div class="col-md-5 modal_body_left">
                        <img src="{{asset($fd->food_image)}}" class="img-responsive" alt="img" style="width: 277px; height: 182px;" alt=" " class="img-responsive">
                    </div>
                    <div class="col-md-7 modal_body_right single-top-right">
                        <h3 class="item_name">{{$fd->food_name}}</h3>


                        <p class="single-price-text">{{$fd->food_detail}}</p>
                        <form action="{{route('add_to_cart')}}" method="post">
                            @csrf
                            <div class="single-price">
                                <ul>
                                    <li>{{$fd->price_size_m}}đ</li>
                                    @if ($fd->price_size_l==null)

                                    @else
                                    <li>{{$fd->price_size_l}}đ</li>
                                    <input type="checkbox" name="price_size_l">
                                    @endif
                                </ul>
                            </div>
                            <input type="hidden" name="food_id" value="{{$fd->food_id}}">
                            <li>Số Lượng</li><input type="number" min="1" name="qty" class="form-control" required/><br>
                            <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                        <div class="single-page-icons social-icons">
                            <ul>
                                <li><h4>Share on</h4></li>
                                <li><a href="#" class="fa fa-facebook icon facebook"> </a></li>
                                <li><a href="#" class="fa fa-twitter icon twitter"> </a></li>
                                <li><a href="#" class="fa fa-google-plus icon googleplus"> </a></li>
                                <li><a href="#" class="fa fa-dribbble icon dribbble"> </a></li>
                                <li><a href="#" class="fa fa-rss icon rss"> </a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- //modal -->
                @endforeach
                <div class="clearfix"> </div>
            </div>
        </div>

        <div class="col-md-3 rsidebar">
            <div class="rsidebar-top">
                <div class="slider-left">
                    <h4>Danh Mục Món Ăn</h4>
                    <div class="row row1 scroll-pane">
                        @foreach ($categories as $cate)
                        <li class="list-group-item list-group-item-action">
                            <a href="{{ route('category_food',['category_id'=>$cate->category_id]) }}">
                                <i></i>
                                {{ $cate->category_name }}
                            </a>
                        </li>
                        @endforeach
                    </div>
                </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
</div>
<!-- //products -->


@endsection
