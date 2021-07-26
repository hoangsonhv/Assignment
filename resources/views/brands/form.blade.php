@extends("layout")
@section("main")
    <div class="content-wrapper">
        <div class="container">
            <h2>Thêm category</h2>
            <div class=" col-md-6">
                <form action="{{url("/brands/save")}}" method="post">
                    @csrf
                    <div class="form-group">
                        <lable><h5>Tên category:</h5></lable>
                        <input type="text" class="form-control" placeholder="Tên..." name="name" value="">
                        @error("name") <div class="alert alert-warning">{{$message}}</div> @enderror

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
