@extends('BackEnd.master')
@section('title')
    Quản Lý Đơn Đặt Hàng
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
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Quản Lý Đơn Đặt Hàng</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>STT</th>
          <th>Tên Khách Hàng</th>
          <th>Thành Tiền</th>
          <th>Tình Trạng Giao Hàng</th>
          <th>Ngày Đặt Hàng</th>
          <th>Loại Thanh Toán</th>
          <th>Tình Trạng Thanh Toán</th>
          <th>Hành Động</th>
        </tr>
        </thead>
        <tbody>
        @php($i=1)
        @foreach ($orders as $ord)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$ord->name}}</td>
                <td>{{$ord->order_total}}</td>
                <td>{{$ord->order_status}}</td>
                <td>{{$ord->created_at}}</td>
                <td>{{$ord->payment_type}}</td>
                <td>{{$ord->payment_status}}</td>
                <td>
                    <a class="btn btn-outline-success" href="{{route('view_order',['order_id'=>$ord->order_id])}}" title="Chi Tiết Đơn Hàng"><i class=" fas fa-search"></i></a>
                    <a class="btn btn-outline-info" href="{{route('view_bill',['order_id'=>$ord->order_id])}}" title="Chi Tiết Hóa Đơn"><i class=" fas fa-search-plus"></i></a>
                    <a class="btn btn-outline-primary" href="{{route('download_bill',['order_id'=>$ord->order_id])}}" title="Xuất Hóa Đơn"><i class=" fas fa-arrow-down"></i></a>
                    <a class=" btn btn-outline-danger" id="delete" href="{{route('delete_order',['order_id'=>$ord->order_id])}}" title="Click Để Xóa" title="Xóa"><i class="fas fa-trash"></i></a>
              </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
@endsection