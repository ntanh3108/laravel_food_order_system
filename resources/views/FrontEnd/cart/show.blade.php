@extends('FrontEnd.master')

@section('title')
    Giỏ Hàng
@endsection

@section('content')
    <div class="products">
        <div class="container">
            <div class="col-md-9 product-w3ls-right">
                <div class="card">
                    <h3 class="card-header text-center mt-3" style="background: lightblue; height:50px; width:auto;">Giỏ Hàng</h3>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên Món Ăn</th>
                            <th scope="col">Hình Ảnh</th>
                            <th scope="col">Giá Tiền</th>
                            <th scope="col">Số Lượng</th>
                            <th scope="col">Thành Tiền</th>
                            <th scope="col">Xóa</th>
                          </tr>
                        </thead>
                        <tbody>
                      @php($i=1)
                      @php($sum=0)
                      @foreach ($foodCart as $fc)

                      <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$fc->name}}</td>
                        <td><img src="{{asset($fc->options->image)}}" style="height: 50px; width: 50px; border-raidus:50%"></td>

                        @if ($fc->options->price_size_l==null)
                        <td>{{$fc->price}}</td>
                        @else
                        <td>{{$fc->options->price_size_l}}</td>
                        @endif
                        <td>
                          <form action="{{route('update_qty')}}" method="POST">
                            @csrf
                            <input type="hidden" name="rowId" value="{{$fc->rowId}}">
                            <input type="number" min="1" name="qty" value="{{$fc->qty}}" style="width:50px; height:auto;">
                            <input type="submit" name="btn" class="btn btn-primary" value="Cập Nhật">
                          </form>
                        </td>

                        <td>{{$subTotal=$fc->price*$fc->qty}}đ</td>
                        <td class="hidden">{{$sum = $sum+$subTotal}}</td>

                        <th scope="row">
                            <a href="{{route('remove_item', ['id'=>$fc->rowId])}}" type="button" class="btn btn-danger">
                              <span aria-hidden="true">X</span>
                            </a>
                        </th>
                      </tr>
                      @endforeach
                      <tr>
                        <td scope="row" style="font-weight: bolder">Voucher Giảm Giá</td>
                        <form action="{{route('get_voucher')}}" method="POST">
                        @csrf
                        <td>
                          <input type="text" name="voucher_code" id="voucher_code">
                        </td>
                        <td><input type="submit" name="" class="btn btn-primary"></td>
                        </form>
                        <td><strong class="text-center" style="color: red">{{Session::get('Error')}}</strong></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td scope="row" style="font-weight: bolder">Tổng Hóa Đơn</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="font-weight: bolder">{{$sum=$sum-(Session::get('voucher_value'))}}đ</td>
                        <?php
                            Session::put('sum',$sum);
                        ?>
                        <td></td>
                      </tr>
                        </tbody>
                      </table>
                </div>
                </div>
            </div>

            @if(Session::get('customer_id'))
            <div class="col-md-9 product-w3ls-right">
              <a href="{{url('/shipping')}}" class="btn btn-info" style="float: right;">
                <i class=" fa fa-shopping-cart"></i>
                THANH TOÁN
              </a>
            </div>

            @else
            <div class="col-md-9 product-w3ls-right">
              <a href="" data-toggle="modal" data-target="#login_or_register" class="btn btn-info" style="float: right;">
                <i class=" fa fa-shopping-cart"></i>
                THANH TOÁN
              </a>
            </div>
            @endif
    </div>


<!-- Modal -->
<div class="modal fade" id="login_or_register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chào Mừng Đến Với Nhà Hàng MlemMlem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h3>Bạn là thành viên mới? <a href="{{route('sign_up')}}" class="btn btn-info text-center">Đăng Ký</a></h3><br>
          <h3>Bạn đã đăng ký? <a href="{{route('login_customer')}}" class="btn btn-danger text-center">Đăng Nhập</a></h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection