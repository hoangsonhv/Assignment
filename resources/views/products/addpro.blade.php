@extends("layout")
@section("main")
    <div class="content-wrapper">
        <div class="container">
            <h2><?php echo $title?></h2>
            <div class=" col-md-6">
                <form action="/save" method="get">
                    <input type="hidden" name="id" value="<?php echo $pro["id"]  ?>">
                    <div class="form-group">
                        <lable><h4>Tên sản phẩm:</h4></lable>
                        <input type="text" class="form-control" placeholder="Tên..." name="name" value="<?php echo $pro["name"] ?>">
                    </div>
                    <div class="form-group">
                        <lable><h4>Mô tả:</h4></lable>
                        <input type="text" class="form-control" placeholder="Mô tả..." name="mota" value="<?php echo $pro["mota"] ?>">
                    </div>
                    <div class="form-group">
                        <lable><h4>Giá sản phẩm:</h4></lable>
                        <input type="number" class="form-control" placeholder="Giá..." name="gia" value="<?php echo $pro["gia"] ?>">
                    </div>
                    <div class="form-group">
                        <lable><h4>Nhà cung cấp:</h4></lable>
                        <input type="text" class="form-control" placeholder="Nhà cung cấp..." name="ncc" value="<?php echo $pro["ncc"] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary my-5 me-5 px-5">Lưu</button>
                    <button type="reset" class="btn btn-warning my-5 me-3 px-5">Reset</button>
                    <a href="/">
                        <button type="button" class="btn btn-success my-5 me-3 px-5">Về trang chủ</button>
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
