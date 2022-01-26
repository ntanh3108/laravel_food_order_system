@extends('FrontEnd.master')

@section('title')
    Hoàn Tất Đặt Hàng
@endsection

@section('content')
    <div class="products">
        <div class="container">
            <div class="col-md-9 product-w3ls-right">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-capitalize">Cảm ơn vì đơn đặt hàng của bạn</h2>
                        <p>Nhà hàng sẽ liên lạc với bạn trong giây lát</p>
                        <p class="btn btn-success"><a href="{{url('/category/food/show/1')}}" style="color: white">Trở về menu</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection