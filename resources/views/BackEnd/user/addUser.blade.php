@extends('BackEnd.master')
@section('title')
    Staff
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
                        Thêm Staff
                    </div>

                    <div class="card-body">
                        <form action="{{route('user_save')}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>Tên Staff</label>
                                <input type="text" name="name" class="form-control" required="required">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" required="required">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required="required">
                            </div>

                            <div class="form-group">
                                <label>Vai Trò</label>
                                <div class="radio" required="required">
                                    <input type="radio" name="role" value="1">Admin
                                    <input type="radio" name="role" value="2">Manager
                                    <input type="radio" name="role" value="3">Shipper
                                </div>
                            </div>

                            <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Thêm Staff</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection