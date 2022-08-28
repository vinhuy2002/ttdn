@extends('form.formlogin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <form action="{{ route('loginReq') }}" class="mt-5 border p-4 bg-light shadow" method="POST">
                @csrf
                <h4>Đăng Nhập</h4>
                <div class="row">
                    <div class="mb-3 mt-3 col-lg-12">
                        <label for="tenTK" class="form-label">Tài Khoản:</label>
                        <input type="text" name="tenTK" id="tenTK" class="form-control"
                            placeholder="Tên tài khoản">
                    </div>
                    <div class="mb-3 col-lg-12">
                        <label for="matKhau" class="form-label">Mật Khẩu:</label>
                        <input type="password" name="matKhau" id="matKhau" class="form-control"
                            placeholder="Mật khẩu">
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary">Đăng Nhập</button>
                    </div>
                    <a href="{{ route('regIndex') }}" class="text-decoration-none">Đăng ký ngay!</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
