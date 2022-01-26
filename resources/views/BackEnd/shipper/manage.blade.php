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
          <th>Tên Shipper</th>
          <th>SDT Shipper</th>
          <th>Hành Động</th>
        </tr>
        </thead>
        <tbody>
        @php($i=1)
        @foreach ($shippers as $sh)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$sh->shipper_name}}</td>
                <td>{{$sh->shipper_phone_number}}</td>
                <td>
                    @if (($sh->shipper_status==1))
                      <a class="btn btn-outline-success" href="{{route('inactive_sh', ['shipper_id'=>$sh->shipper_id])}}"><i class=" fas fa-arrow-up "></i></a>
                    @else
                      <a class="btn btn-outline-info" href="{{route('active_sh', ['shipper_id'=>$sh->shipper_id])}}"><i class=" fas fa-arrow-down "></i></a>
                    @endif
                    <a type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{$sh->shipper_id}}"><i class=" fas fa-edit"></i></a>

                    {{-- EDIT MODAL --}}
                    <div class="modal" id="edit{{$sh->shipper_id}}" tabindex="-1" role="dialog">
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
                            <form action="{{route('update_sh')}}" method="post">
                            @csrf
                              <div class="form-group">
                                <label>Tên Shipper</label>
                                <input type="text" name="shipper_name" value="{{$sh->shipper_name}}" class="form-control">
                                <input type="hidden" name="shipper_id" value="{{$sh->shipper_id}}" class="form-control">
                              </div>

                              <div class="form-group">
                                  <label>SDT Shipper</label>
                                  <input type="text" name="shipper_phone_number" value="{{$sh->shipper_phone_number}}" class="form-control" >
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

                    <a class=" btn btn-outline-danger " id="delete" href="{{route('delete_sh', ['shipper_id'=>$sh->shipper_id])}}" title="Click Để Xóa"><i class=" fas fa-trash "></i></a>
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