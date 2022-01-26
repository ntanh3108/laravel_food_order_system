@extends('BackEnd.master')
@section('title')
    Shipper
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
                        Thêm Shipper
                    </div>

                    <div class="card-body">
                        <form action="{{route('shipper_save')}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>Tên Shipper</label>
                                <input type="text" name="shipper_name" class="form-control" required="required">
                            </div>

                            <div class="form-group">
                                <label>SDT Shipper</label>
                                <input type="text" name="shipper_phone_number" class="form-control" required="required">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="shipper_password" class="form-control" required="required">
                            </div>

                            <div class="form-group">
                                <label>Ngày Thêm</label>
                                <input type="date" name="added_on" class="form-control" required="required">
                            </div>

                            <div class="form-group">
                                <label>Trạng Thái</label>
                                <div class="radio" required="required">
                                    <input type="radio" name="shipper_status" value="1">Active
                                    <input type="radio" name="shipper_status" value="0">Inactive
                                </div>
                            </div>

                            <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Thêm Shipper</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection