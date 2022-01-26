@extends('Manager.master')
@section('title')
    Quản Lý Món Ăn
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
      <h3 class="card-title">Quản Lý Món Ăn</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>STT</th>
          <th>Tên Món Ăn</th>
          <th>Tên Danh Mục</th>
          <th>Chi Tiết Món Ăn</th>
          <th>Hình Ảnh</th>
          <th>Hành Động</th>
        </tr>
        </thead>
        <tbody>
        @php($i=1)
        @foreach ($food as $fd)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$fd->food_name}}</td>
                <td>{{$fd->category_name}}</td>
                <td>{{$fd->food_detail}}</td>
                <td><img src="{{ asset($fd->food_image) }}" alt="ERROR" height="50" width="100" class=" img-thumbnail img-fluid"></td>
                <td>
                    @if (($fd->food_status==1))
                      <a class="btn btn-outline-success" href="{{route('manager_inactive_fd', ['food_id'=>$fd->food_id])}}"><i class=" fas fa-arrow-up "></i></a>
                    @else
                      <a class="btn btn-outline-info" href="{{route('manager_active_fd', ['food_id'=>$fd->food_id])}}"><i class=" fas fa-arrow-down "></i></a>
                    @endif
                    <a type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{$fd->food_id}}"><i class=" fas fa-edit"></i></a>

                    {{-- EDIT MODAL --}}
                    <div class="modal" id="edit{{$fd->food_id}}" tabindex="-1" role="dialog">
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
                              <form action="{{route('manager_update_fd')}}" method="post" enctype="multipart/form-data">
                              @csrf
                                <div class="form-group">
                                  <label>Tên Món Ăn</label>
                                  <input type="text" name="food_name" value="{{$fd->food_name}}" class="form-control">
                                  <input type="hidden" name="food_id" value="{{$fd->food_id}}" class="form-control">
                                </div>

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
                                    <label>Chi Tiết Món Ăn</label>
                                    <textarea class="form-control" name="food_detail" cols="30" rows="5" required="required">{{$fd->food_detail}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Hình Ảnh Cũ</label>
                                    <img src="{{ asset($fd->food_image) }}" alt="ERROR" style="height: 150px; withd=150px; border-radius=50%;">
                                    <input type="file" name="food_image" class="form-control" accept="image/*">
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
                                              <input type="text" class="form-control" name="price_size_m" placeholder="Giá" value="{{$fd->price_size_m}}">
                                          </div>

                                          <div class="col-md-6">
                                              Size L
                                          </div>
                                          <div class="col-md-6">
                                              <input type="text" class="form-control" name="price_size_l" placeholder="Giá" value={{$fd->price_size_l}}>
                                          </div>
                                      </div>
                                  </div>
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

                    <a class=" btn btn-outline-danger " id="delete" href="{{route('manager_delete_fd', ['food_id'=>$fd->food_id])}}" title="Click Để Xóa"><i class=" fas fa-trash "></i></a>
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