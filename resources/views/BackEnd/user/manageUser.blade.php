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
          <th>Tên Staff</th>
          <th>Email</th>
          <th>Vai Trò</th>
          <th>Hành Động</th>
        </tr>
        </thead>
        <tbody>
        @php($i=1)
        @foreach ($staffs as $st)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$st->name}}</td>
                <td>{{$st->email}}</td>
                <td>
                    @if ($st->role==1)
                        Admin
                    @elseif($st->role==2)
                        Manager
                    @else
                        Shipper
                    @endif
                </td>
                <td>
                    <a type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{$st->id}}"><i class=" fas fa-edit"></i></a>


                    <div class="modal" id="edit{{$st->id}}" tabindex="-1" role="dialog">
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
                            <form action="{{route('update_st')}}" method="post">
                            @csrf
                              <div class="form-group">
                                <label>Tên Staff</label>
                                <input type="text" name="name" value="{{$st->name}}" class="form-control">
                                <input type="hidden" name="id" value="{{$st->id}}" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>Vai Trò</label>
                                <div class="radio" required="required">
                                    <input type="radio" name="role" value="1">Admin
                                    <input type="radio" name="role" value="2">Manager
                                    <input type="radio" name="role" value="3">Shipper
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

                    <a class=" btn btn-outline-danger" id="delete" href="{{route('delete_st', ['id'=>$st->id])}}" title="Click Để Xóa"><i class="fas fa-trash"></i></a>
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