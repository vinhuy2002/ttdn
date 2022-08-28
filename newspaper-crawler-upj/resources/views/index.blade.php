@extends('form.formindex')
@section('content')
    <div class="container mt-3">
        <h3 class="mb-3">Nhập link bài báo</h3>
        <form action="/" method="GET">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default" name="linkURL" placeholder="Ví dụ: https://vnexpress.net/">
                <button type="submit" class="btn btn-primary">Lấy kết quả</button>
            </div>
        </form>

        @if (!empty($link))
            <h5>Link bài viết: </h5>
            <a href="{{ $link }}">{{ $link }}</a>
            <h5>Tiêu đề: </h5>
            <p>{{ $tieuDe }}</p>
            <h5>Nội dung: </h5>
            @foreach ($noiDung as $item)
                <p>{{ $item }}</p>
            @endforeach
            <h5>Hình ảnh: </h5>
            @foreach ($hinhAnh as $item)
                <img src="{{ $item }}" alt=""
                    class="mx-auto d-block img-fluid mt-2 mb-2 shadow p-3 mb-5 bg-body rounded">
            @endforeach

        @endif
    </div>

@stop
