@extends("layout");
@section("main")
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Danh sách sản phẩm</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Danh sách sản phẩm</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Đặt hàng</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <a href="{{url("/products/new")}}" class="btn btn-outline-primary">Thêm mới</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <form action="{{url("checkout")}}" method="post">
                            <div class="row">

                                <div class="col-md-6">

                                    @csrf
                                    <div class="form-group">
                                        <label>Customer Name</label>
                                        <input type="text" name="customer_name" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Customer Tel</label>
                                        <input type="tel" name="customer_tel" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Customer Address</label>
                                        <textarea class="form-control" name="customer_address"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>City</label>
                                        <select class="form-control">
                                            <option disabled selected>Hãy chọn thành phố</option>
                                            @foreach($cities as $as)
                                                <option value="{{$as->__get("city")}}">{{$as->__get("city")}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <table class="table">
                                        <tbody>
                                        @php $total = 0;$checkout=0; @endphp
                                        @foreach($cart as $item)
                                            @php $total += $item->cart_qty * $item->__get("price") @endphp
                                            <tr>
                                                <td @if($item->image==null)>
                                                    Ảnh chưa cập nhập
                                                </td>
                                                <td @else>
                                                    <img style="max-width: 100px" src="{{$item->GetImg()}}">
                                                </td>
                                                @endif
                                                <td>
                                                    <p>{{$item->__get("name")}}</p>
                                                    @if($item->qty < $item->cart_qty)
                                                        <p class="text-danger"><i>Sản phẩm không đủ số lượng</i></p>
                                                        @php $checkout++ @endphp
                                                    @endif
                                                </td>
                                                <td>{{$item->__get("price")}}</td>
                                                <td>{{$item->cart_qty}}</td>
                                                <td>{{$item->cart_qty * $item->__get("price")}}</td>
                                            </tr>
                                        @endforeach
                                        <tfoot>
                                        <tr>
                                            <td colspan="4">Grand Total</td>
                                            <td>{{$total}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                @if($checkout ==0)
                                                    <div class="form-group">
                                                        <button class="btn btn-outline-primary" type="submit">Place order</button>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                        </tfoot>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->

                </div>
            </div>
        </section>

    </div>
@endsection
