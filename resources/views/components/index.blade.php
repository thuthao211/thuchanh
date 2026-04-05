@extends("components.layout_sach")

@section("title", "Trang chủ - Nhà Sách")

@section("content")
<style>
.navbar {
  background-color: #ff5850;
  font-weight:bold;
}
.nav-item a {
  color: #fff!important;
}
.navbar-nav {
  margin:0 auto;
}
.list-book{
  display:grid;
  grid-template-columns:repeat(4,24%);
}
.book {
  margin:10px;
  text-align:center;
}
.alert-success {
    background-color: #d4edda;
    color: #155724;
    padding: 20px;
    border-radius: 8px;
    margin: 20px auto;
    width: 90%;
    text-align: center;
}
</style>

@if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
        <p>Hệ thống đã gửi chi tiết đơn hàng vào Email của bạn.</p>
    </div>
@endif

@if(session('error'))
    <div style="background-color:#f8d7da; padding:15px; margin:20px; text-align:center;">
        {{ session('error') }}
    </div>
@endif

<div class='list-book'>
    @foreach($data as $row)
        <div class='book'>
            <a href="{{ url('chitietsach/'.$row->id) }}">
                <img src="{{ asset('hinh/image/'.$row->file_anh_bia) }}" width="200">
            </a>
            <b>{{ $row->tieu_de }}</b><br/>
            <i>{{ number_format($row->gia_ban,0,",",".") }}đ</i>
        </div>
    @endforeach
</div>
@endsection