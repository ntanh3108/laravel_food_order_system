    <!doctype html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">

            <style>
                *{ font-family: DejaVu Sans !important;}
            </style>
        </head>
        <body>
            <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
                <div class="card">
                    <div class="card-header p-4">
                        <div class="float-right">
                            <h3 class="mb-0">Đơn hàng {{$order->order_id}}</h3>
                            Ngày: {{$order->created_at}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <h5 class="mb-3">From:</h5>
                                <h3 class="text-dark mb-1">MlemMlem Restaurant</h3>
                                <div>Việt Nam, Trái Đất</div>
                                <div>Email: tuananhdeptrai@gmail.com</div>
                                <div>Phone: +84 397 803 108</div>
                            </div>
                            <hr>
                            <div class="col-sm-6 ">
                                <h5 class="mb-3">To:</h5>
                                <h3 class="text-dark mb-1">{{$customer->name}}</h3>
                                <div>Địa Chỉ: {{$shipping->address}}</div>
                                <div>Email: {{$customer->email}}</div>
                                <div>Phone: {{$customer->phone_number}}</div>
                            </div>
                        </div>
                        <div class="table-responsive-sm">
                            <table border="1" >
                                <thead>
                                    <tr>
                                        <th class="center">STT</th>
                                        <th>Item</th>
                                        <th class="right">Price</th>
                                        <th class="center">Qty</th>
                                        <th class="right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                    @foreach($order_detail as $ord)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$ord->food_name}}</td>
                                            <td>{{$ord->food_price}}</td>
                                            <td>{{$ord->food_qty}}</td>
                                            <td>{{$ord->food_price * $ord->food_qty}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-5">
                            </div>
                            <div class="col-lg-4 col-sm-5 ml-auto">
                                <table class="table table-clear">
                                    <tbody>
                                        <tr>
                                            <td class="left">
                                                <strong class="text-dark">Total(Đã qua mã giảm giá)</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="right">
                                                <strong class="text-dark">{{$order->order_total}}</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <p class="mb-0">MlemMlem Restaurant, Việt Nam, Trái Đất</p>
                    </div>
                </div>
            </div>
        </body>
    </html>
