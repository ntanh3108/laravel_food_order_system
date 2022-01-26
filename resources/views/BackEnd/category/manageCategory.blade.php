@extends('BackEnd.master')
@section('title')
    Category Manage
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
      <h3 class="card-title">Quản Lý Danh Mục Món Ăn</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>STT</th>
          <th>Tên Danh Mục</th>
          <th>Hành Động</th>
        </tr>
        </thead>
        <tbody>
        @php($i=1)
        @foreach ($categories as $cate)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$cate->category_name}}</td>
                <td>
                    @if (($cate->category_status==1))
                      <a class="btn btn-outline-success" href="{{route('inactive_cate', ['category_id'=>$cate->category_id])}}"><i class=" fas fa-arrow-up "></i></a>
                    @else
                      <a class="btn btn-outline-info" href="{{route('active_cate', ['category_id'=>$cate->category_id])}}"><i class=" fas fa-arrow-down "></i></a>
                    @endif
                    <a type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{$cate->category_id}}"><i class=" fas fa-edit"></i></a>

                    {{-- EDIT MODAL --}}
                    <div class="modal" id="edit{{$cate->category_id}}" tabindex="-1" role="dialog">
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
                            <form action="{{route('update_cate')}}" method="post">
                            @csrf
                              <div class="form-group">
                                <label>Tên Danh Mục</label>
                                <input type="text" name="category_name" value="{{$cate->category_name}}" class="form-control">
                                <input type="hidden" name="category_id" value="{{$cate->category_id}}" class="form-control">
                              </div>

                              <div class="form-group">
                                  <label>Order Number</label>
                                  <input type="text" name="order_number" value="{{$cate->order_number}}" class="form-control" >
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

                    <a class=" btn btn-outline-danger " id="delete" href="{{route('delete_cate', ['category_id'=>$cate->category_id])}}" title="Click Để Xóa"><i class=" fas fa-trash "></i></a>
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