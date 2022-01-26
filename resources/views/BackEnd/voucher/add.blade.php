@extends('BackEnd.master')
@section('title')
    Voucher
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="offset-3 col-md-5 my-lg-5">

                @if(Session::get('sms'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{Session::get('sms')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif

                <div class="card">
                    <div class="card-header text-center">
                        Thêm Voucher
                    </div>

                    <div class="card-body">
                        <form action="{{route('voucher_save')}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>Tên voucher</label>
                                <input type="text" name="voucher_code" class="form-control" required="required">
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
                                <input type="text" name="voucher_value" class="form-control" required="required">
                            </div>

                            <div class="form-group">
                                <label>Đơn Hàng Tối Thiểu</label>
                                <input type="text" name="cart_min_value" class="form-control" required="required">
                            </div>

                            <div class="form-group">
                                <label>Ngày Hết Hạn</label>
                                <input type="date" name="expired_on" class="form-control" required="required">
                            </div>

                            <div class="form-group">
                                <label>Ngày Thêm</label>
                                <input type="date" name="added_on" class="form-control" required="required">
                            </div>

                            <div class="form-group">
                                <label>Trạng Thái</label>
                                <div class="radio" required="required">
                                    <input type="radio" name="voucher_status" value="1">Active
                                    <input type="radio" name="voucher_status" value="0">Inactive
                                </div>
                            </div>

                            <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Thêm Voucher</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection