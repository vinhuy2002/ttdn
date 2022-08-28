@extends('form.formlogin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <form action="{{ route('regReq') }}" class="mt-5 border p-4 bg-light shadow" method="POST">
                    @csrf
                    <h4>Đăng Ký</h4>
                    <div class="mb-3 mt-3">
                        <label for="hoVaTen" class="form-label">Họ và tên:</label>
                        <input type="text" name="hoVaTen" id="hoVaTen" class="form-control"
                            placeholder="Họ và tên">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="tenTK" class="form-label">Tài Khoản:</label>
                        <input type="text" name="tenTK" id="tenTK" class="form-control"
                            placeholder="Tên tài khoản">
                    </div>
                    <div class="mb-3">
                        <label for="matKhau" class="form-label">Mật Khẩu:</label>
                        <input type="password" name="matKhau" id="matKhau" class="form-control"
                            placeholder="Mật khẩu">
                    </div>
                    <div class="mb-3">
                        <label for="matKhauConfirm" class="form-label">Xác Nhận Mật Khẩu:</label>
                        <input type="password" name="matKhauConfirm" id="matKhauConfirm" class="form-control"
                            placeholder="Xác Nhận Mật khẩu">
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary">Đăng Ký</button>
                    </div>
                    <a href="{{ route('loginIndex') }}" class="text-decoration-none">Đăng nhập ngay!</a>
                </form>
            </div>
        </div>
    </div>
@stop
