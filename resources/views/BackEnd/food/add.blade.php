@extends('BackEnd.master')
@section('title')
    Món Ăn
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
                        Thêm Món Ăn
                    </div>

                    <div class="card-body">
                        <form action="{{route('food_save')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Chọn Danh Mục</label>
                                <select name="category_id" class="form-control">
                                    <option>Chọn Danh Mục</option>
                                    @foreach ($categories as $cate)
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tên Món Ăn</label>
                                <input type="text" name="food_name" class="form-control" required="required">
                            </div>

                            <div class="form-group">
                                <label>Chi Tiết Món Ăn</label>
                                <textarea class="form-control" name="food_detail" cols="30" rows="5" required="required"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Hình Ảnh</label>
                                <input type="file" name="food_image" class="form-control" accept="image/*" required="required">
                            </div>

                            <div class="form-group">
                                <label>Ngày Thêm</label>
                                <input type="date" name="added_on" class="form-control" required="required">
                            </div>

                            <div class="form-group">
                                <label>Trạng Thái</label>
                                <div class="radio" required="required">
                                    <input type="radio" name="food_status" value="1">Active
                                    <input type="radio" name="food_status" value="0">Inactive
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                  Size Món Ăn
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            Size M
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="price_size_m" placeholder="Giá" >
                                        </div>

                                        <div class="col-md-6">
                                            Size L
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="price_size_l" placeholder="Giá">
                                        </div>
                                    </div>
                                </div>
                              </div>


                            <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Thêm Món Ăn</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection