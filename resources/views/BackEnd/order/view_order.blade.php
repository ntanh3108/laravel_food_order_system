@extends('BackEnd.master')
@section('title')
    Chi Tiết Đơn Hàng
@endsection
@section('content')

  @if(Session::get('sms'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>{{Session::get('sms')}}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif


<div class="card my-5">
    <div class="card-header">
        <h1 class="text-center text-muted">Thông tin khách hàng</h1>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <tr>
            <th>Name</th>
            <td>{{$customer->name}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{$customer->email}}</td>
        </tr>
        <tr>
            <th>SĐT</th>
            <td>{{$customer->phone_number}}</td>
        </tr>
      </table>
    </div>
    <!-- /.card-body -->
</div>

<div class="card my-5">
    <div class="card-header">
        <h1 class="text-center text-muted">Thông tin giao hàng</h1>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <tr>
            <th>Name</th>
            <td>{{$shipping->name}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{$shipping->email}}</td>
        </tr>
        <tr>
            <th>SĐT</th>
            <td>{{$shipping->phone_number}}</td>
        </tr>
        <tr>
            <th>Địa Chỉ</th>
            <td>{{$shipping->address}}</td>
        </tr>
      </table>
    </div>
    <!-- /.card-body -->
</div>

<div class="card my-5">
    <div class="card-header">
        <h1 class="text-center text-muted">Món Ăn Trong Đơn Hàng</h1>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
              <th>STT</th>
              <th>ID Món Ăn</th>
              <th>Tên Món Ăn</th>
              <th>Giá Tiền</th>
              <th>Số Lượng</th>
              <th>Thành Tiền</th>
            </tr>
        </thead>
        <tbody>
            @php($i=1)
            @foreach($order_detail as $ord)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$ord->food_id}}</td>
                    <td>{{$ord->food_name}}</td>
                    <td>{{$ord->food_price}}</td>
                    <td>{{$ord->food_qty}}</td>
                    <td>{{$ord->food_price * $ord->food_qty}}</td>
                </tr>
            @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
</div>

<div class="card my-5">
    <div class="card-header">
        <h1 class="text-center text-muted">Thông tin đơn hàng</h1>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

      <table id="example2" class="table table-bordered table-hover">
        <tr>
            <th>Mã Đơn Hàng</th>
            <td>{{$order->order_id}}</td>
        </tr>
        <tr>
            <th>Tổng Đơn Hàng (Đã qua mã giảm giá)</th>
            <td>{{$order->order_total}}</td>
        </tr>
        <tr>
            <th>Tình Trạng Giao Hàng</th>
            <td>{{$order->order_status}}</td>
        </tr>
      </table>
    </div>
    <!-- /.card-body -->
</div>

<div class="card my-5">
    <div class="card-header">
        <h1 class="text-center text-muted">Thông tin thanh toán</h1>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

      <table id="example2" class="table table-bordered table-hover">
        <tr>
            <th>Phương Thức Thanh Toán</th>
            <td>{{$payment->payment_type}}</td>
        </tr>
        <tr>
            <th>Tình Trạng Thanh Toán</th>
            <td>{{$payment->payment_status}}</td>
        </tr>
      </table>
    </div>
    <!-- /.card-body -->
</div>



@endsection