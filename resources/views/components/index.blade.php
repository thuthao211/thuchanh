@extends("components.layout_sach")

@section("title","Sách")

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

/* Style cho thông báo thành công */
.alert-success {
    background-color: #d4edda;
    color: #155724;
    padding: 20px;
    border: 1px solid #c3e6cb;
    border-radius: 8px;
    margin: 20px auto;
    width: 90%;
    text-align: center;
    font-size: 1.2rem;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}
</style>

@if(session('success'))
    <div class="alert-success">
      {{ session('success') }}
        <p style="font-size: 0.9rem; margin-top: 5px; font-weight: normal;">
            Hệ thống đã gửi chi tiết đơn hàng vào Email của bạn.
        </p>
    </div>
@endif

@if(session('error'))
    <div style="background-color: #f8d7da; color: #721c24; padding: 15px; margin: 20px; border-radius: 8px; text-align: center;">
        {{ session('error') }}
    </div>
@endif

<div class='list-book'>
  @foreach($data as $row)
    <div class='book'>
      <a href="{{ url('chitietsach/'.$row->id) }}">
        <img src="{{ asset('book_image/'.$row->file_anh_bia) }}" width="200px" height="200px">
      </a>
      <b>{{$row->tieu_de}}</b><br/>
      <i>{{number_format($row->gia_ban,0,",",".")}}đ</i>
    </div>
  @endforeach
</div>
@endsection