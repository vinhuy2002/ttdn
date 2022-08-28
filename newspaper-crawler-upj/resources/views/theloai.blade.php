@extends('form.formindex')
@section('content')
    <div class="container mt-3">
        <h3 class="mb-3">Nhập Thể Loại Báo</h3>
        <form action="/cao-the-loai" method="GET">
            @csrf
            <div class="row">
                <div class="input-group mb-3">
                    <div class="col"><input type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" name="linkURL"
                            placeholder="Ví dụ: https://vnexpress.net/thoi-su"></div>
                    <div class="col-md-auto">
                        <select class="form-select" aria-label="Default select example" id="noBao" name="noBao">
                            <option value="3" selected>Chọn số lượng (Mặc định: 3)</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                    <div class="col-md-auto"><button type="submit" class="btn btn-primary ">Lấy kết quả</button></div>
                </div>
            </div>
        </form>

        <div class="form-group" id="process" style="display:none;">
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0"
                    aria-valuemax="100" style="">
                    @if (!empty($link))
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count = 1;
                                @endphp
                                @foreach ($arr as $item)
                                    <tr>
                                        <td scope="row">{{ $count++ }}</td>
                                        <td scope="row">{{ $item }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <script>
                            $(document).ready(function() {
                                $('#dataTable').DataTable({
                                    "columnDefs": [{
                                        "width": "5%",
                                        "targets": 0
                                    }]
                                });
                            });
                        </script>
                </div>
                @if (session()->get('dangnhap'))
                    <form action="/luu-the-loai-tc" method="POST">
                        @csrf
                        @foreach ($arr as $item)
                            <input name="link[]" value="{{ $item }}" type="hidden">
                        @endforeach
                        <button type="submit" class="btn btn-primary float"><i class="fa fa-plus my-float"></i></button>
                @endif
                </form>

                @endif
            @stop
