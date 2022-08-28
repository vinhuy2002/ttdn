@extends('dashboard.index')
@section('dashboard-content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="" style="margin-top: 10px">
                <strong>BÀI BÁO ĐÃ CÀO</strong>&ensp;
                <i class="fas fa-table"></i>
            </h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Link</th>
                            <th scope="col">Tiêu Đề</th>
                            <th scope="col">Nội Dung</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Lệnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($data as $item)
                            <tr>
                                <td scope="row">{{ $i++ }}</td>
                                <td scope="row">{{ $item['link_bai_bao'] }}</td>
                                <td scope="row">{{ $item['tieu_de'] }}</td>
                                <td scope="row">
                                    @php
                                        $arr =json_decode($item['noi_dung']);
                                        foreach ($arr as $key) {
                                            echo $key."\n";

                                        }
                                    @endphp
                                </td>
                                <td scope="row">
                                    @php
                                        $arr1 = json_decode($item['hinh_anh']);
                                    @endphp
                                    @foreach ($arr1 as $item1)
                                        <a href="{{ $item1 }}" class="mb-5">
                                            <img src="{{ $item1 }}" width="200" height="100" alt="">
                                        </a>
                                    @endforeach
                                </td>
                                <td scope="row">
                                    <a href="/dashboard/xoa/id={{ $item['id_bao'] }}"
                                        onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button"
                                        class="btn btn-danger btn-rounded">Xóa</a>
                                </td>
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
        </div>
    </div>
@endsection
