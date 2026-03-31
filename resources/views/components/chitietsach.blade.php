@extends("components.layout_sach")

@section("title", "Chi tiết: " . $sach->tieu_de)

@section("content")
<div class="row mt-3">
    <div class="col-md-5">
        <img src="{{ asset('book_image/'.$sach->file_anh_bia) }}" class="img-fluid border shadow-sm">
    </div>
    <div class="col-md-7">
        <h2 class="font-weight-bold">{{ $sach->tieu_de }}</h2>
        <p class="text-danger h3 font-weight-bold">{{ number_format($sach->gia_ban, 0, ',', '.') }}đ</p>
        <hr>
        <p><strong>Mô tả nội dung:</strong></p>
        <div style="line-height: 1.8; text-align: justify; color: #555;">
            {{ $sach->mo_ta }}
        </div>
        <br>
        <button class="btn btn-danger btn-lg px-5">THÊM VÀO GIỎ HÀNG</button>
    </div>
</div>
@endsection