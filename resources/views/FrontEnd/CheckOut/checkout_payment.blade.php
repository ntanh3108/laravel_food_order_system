@extends('FrontEnd.master')

@section('Title')
    Thanh Toán
@endsection

@section('content')
<div class="products">
    <div class="container">
        <div class="col-md-9 product-w3ls-right">
            <div class="card">
               <h3>Xin chào {{Session::get('customer_name')}}, chọn phương thức thanh toán</h3>
                <div class="card-body">
                    <form action="{{route('new_order')}}" method="POST">
                    @csrf
                    <table class="table">
                        <tr>
                            <th>Thanh toán khi nhận hàng</th>
                            <td><input type="radio" name="payment_type" value="Tại Nhà"></td>
                        </tr>
                        <tr>
                            <th>Thanh toán Online (Đang Phát Triển)</th>
                            <td><input type="radio" name="payment_type" value="Online"></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><input type="submit" name="btn" class="btn btn-success" value="Đặt Hàng"></td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection