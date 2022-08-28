@extends('form.formindex')
@section('content')
<div class="container mt-3">
    <h3>Chào mừng bạn đã đến phần hướng dẫn của Website Scrapper (1-2 phút đọc)</h3>
    <p>Website mình tạo ra nhằm mục đích cào dữ liệu từ những nguồn đọc báo khác nhau, một project nhỏ nhằm nâng cao khả năng lập trình của mình, cũng như là hiểu sâu hơn về cách cào dữ liệu qua các thẻ HTML từ những trang web đọc báo khác nhau.</p>
    <p>Bạn vào 1 trang báo bất kỳ (hiện tại website của mình chỉ đang hỗ trợ vnexpress.vn). Nhấp vào một bài báo bất kỳ ở trang web đó và lấy link của bài báo đó (Copy link).</p>
    <img src="{{ url('images/h1.png') }}" alt="" class="mx-auto d-block img-fluid mt-2 mb-2 shadow p-3 mb-5 bg-body rounded">
    <p>Tiếp tục đưa link mới copy vào trang web của mình, dán lên, nhấp nút <strong>"Lấy kết quả"</strong> và đợi kết quả thôi :D.</p>
    <img src="{{ url('images/h2.png') }}" alt="" class="mx-auto d-block img-fluid mt-2 mb-2 shadow p-3 mb-5 bg-body rounded">
    <p>Ngoài ra bạn có thể tải file về dưới dạng Json, phù hợp cho những bạn lập trình tham khảo.</p>
    <p>Mọi thông tin chi tiết hoặc là quá trình bạn đang dùng gặp phải một số bug bạn thì bạn có thể liên hệ mình qua Email: vinhuy2002@gmail.com</p>
    <p>Cảm ơn bạn đã đọc phần hướng dẫn của mình.</p>
</div>
@stop
