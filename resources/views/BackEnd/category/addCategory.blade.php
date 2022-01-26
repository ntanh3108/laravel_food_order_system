@extends('BackEnd.master')
@section('title')
    Category Page
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
                        Thêm Danh Mục
                    </div>

                    <div class="card-body">
                        <form action="{{route('cate_save')}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>Tên Danh Mục</label>
                                <input type="text" name="category_name" class="form-control" required="required">
                            </div>

                            <div class="form-group">
                                <label>Order Number</label>
                                <input type="text" name="order_number" class="form-control" required="required">
                            </div>

                            <div class="form-group">
                                <label>Ngày Thêm</label>
                                <input type="date" name="added_on" class="form-control" required="required">
                            </div>

                            <div class="form-group">
                                <label>Trạng Thái</label>
                                <div class="radio" required="required">
                                    <input type="radio" name="category_status" value="1">Active
                                    <input type="radio" name="category_status" value="0">Inactive
                                </div>
                            </div>

                            <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Thêm Danh Mục</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection