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
                        <h3 class="card-title">Danh sách</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <a href="{{url("admin/products/new")}}" class="btn btn-outline-primary">Thêm mới</a>
                            </div>
                        </div>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <a href="{{url("/checkout")}}" class="btn btn-outline-primary">Checkout</a>
                            </div>
                        </div>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <a href="{{url("/api")}}" class="btn btn-outline-primary">Checkout react</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Tên</th>
                                <th>Hình ảnh</th>
                                <th >Mô tả</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Loại bánh</th>
                                <th>Hãng bánh</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td @if($product->image==null)>
                                        Ảnh chưa cập nhập
                                    </td>
                                    <td @else>
                                        <img style="max-width: 100px" src="{{$product->GetImg()}}">
                                    </td>
                                    @endif
                                    <td class="text-wrap" style="width: 30rem">{{$product->description}}</td>
                                    <td>{{$product->price}} VND </td>
                                    <td>{{$product->qty}}</td>
{{--                                    <td>{{$product->__get("category_name")}}</td>--}}
                                    <td>{{$product->Category->__get("name")}}</td>
                                    <td>{{$product->Brand->__get("name")}}</td>

                                    <td>
                                        <form action="{{url("/admin/products/edit",["id"=>$product->id])}}" method="get">
                                            <button type="submit" class="btn btn-outline-primary">Sửa</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{url("/admin/products/delete",["id"=>$product->id])}}" method="get">

                                            <button type="submit" class="btn btn-outline-success">Xóa</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{url("/admin/products/add-to-cart",["id"=>$product->id])}}" method="get">
                                            <button type="submit" class="btn btn-outline-danger">Cart+</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        {!! $products->links("vendor.pagination.default") !!}
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
