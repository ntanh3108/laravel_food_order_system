@extends('BackEnd.master')
@section('title')
    Quản Lý Staff
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
      <h3 class="card-title">Quản Lý Staff</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>STT</th>
          <th>ID Khách Hàng</th>
          <th>Tên</th>
          <th>Email</th>
          <th>Hành Động</th>
        </tr>
        </thead>
        <tbody>
        @php($i=1)
        @foreach ($customer as $cus)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$cus->customer_id}}</td>
                <td>{{$cus->name}}</td>
                <td>{{$cus->email}}</td>
                <td>
                    <a class=" btn btn-outline-danger" id="delete" href="{{route('delete_customer', ['customer_id'=>$cus->customer_id])}}" title="Click Để Xóa"><i class="fas fa-trash"></i></a>
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