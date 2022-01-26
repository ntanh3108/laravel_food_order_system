@extends('BackEnd.master')
@section('title')
    Quản Lý Shippper
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
      <h3 class="card-title">Quản Lý Shipper</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>STT</th>
          <th>Voucher Code</th>
          <th>Loại Voucher</th>
          <th>Giá Trị Voucher</th>
          <th>Đơn Hàng Tối Thiểu</th>
          <th>Ngày Tạo</th>
          <th>Ngày Hết Hạn</th>
          <th>Hành Động</th>
        </tr>
        </thead>
        <tbody>
        @php($i=1)
        @foreach ($vouchers as $vc)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$vc->voucher_code}}</td>
                <td>
                    @if ($vc->voucher_type==1)
                        Phần Trăm
                    @else
                        Tiền Mặt
                    @endif
                </td>
                <td>{{$vc->voucher_value}}</td>
                <td>{{$vc->cart_min_value}}</td>
                <td>{{$vc->added_on}}</td>
                <td>{{$vc->expired_on}}</td>
                <td>
                    @if (($vc->voucher_status==1))
                      <a class="btn btn-outline-success" href="{{route('inactive_vc', ['voucher_id'=>$vc->voucher_id])}}"><i class=" fas fa-arrow-up "></i></a>
                    @else
                      <a class="btn btn-outline-info" href="{{route('active_vc', ['voucher_id'=>$vc->voucher_id])}}"><i class=" fas fa-arrow-down "></i></a>
                    @endif
                    <a type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{$vc->voucher_id}}"><i class=" fas fa-edit"></i></a>

                    {{-- EDIT MODAL --}}
                    <div class="modal" id="edit{{$vc->voucher_id}}" tabindex="-1" role="dialog">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Chỉnh Sửa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <div class="modal-body">
                            <p>Nội Dung Chỉnh Sửa</p>
                            <form action="{{route('update_vc')}}" method="post">
                            @csrf
                              <div class="form-group">
                                <label>Voucher Code</label>
                                <input type="text" name="voucher_code" value="{{$vc->voucher_code}}" class="form-control">
                                <input type="hidden" name="voucher_id" value="{{$vc->voucher_id}}" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>Loại Voucher</label>
                                <div class="radio" required="required">
                                    <input type="radio" name="voucher_type" value="1">Phần Trăm
                                    <input type="radio" name="voucher_type" value="0">Tiền Mặt
                                </div>
                              </div>

                              <div class="form-group">
                                <label>Giá Trị Voucher</label>
                                <input value="{{$vc->voucher_value}}" type="text" name="voucher_value" class="form-control" required="required">
                              </div>

                            <div class="form-group">
                                <label>Đơn Hàng Tối Thiểu</label>
                                <input value="{{$vc->cart_min_value}}" type="text" name="cart_min_value" class="form-control" required="required">
                            </div>

                            <div class="form-group">
                                <label>Ngày Hết Hạn</label>
                                <input value="{{$vc->expired_on}}" type="date" name="expired_on" class="form-control" required="required">
                            </div>
                            </div>


                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="Update">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
                    {{-- EDIT MODAL --}}

                    <a class=" btn btn-outline-danger" id="delete" href="{{route('delete_vc', ['voucher_id'=>$vc->voucher_id])}}" title="Click Để Xóa"><i class=" fas fa-trash "></i></a>
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