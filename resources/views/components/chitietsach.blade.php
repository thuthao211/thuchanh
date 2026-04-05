@extends("components.layout_sach")

@section("title", "Chi tiết: " . $sach->tieu_de)

@section("content")
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
.grid-container{
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 15px;
}
</style>

<div class="row mt-3">
    <div class="col-md-5">
        <img src="{{ asset('hinh/image/'.$sach->file_anh_bia) }}" class="img-fluid border shadow-sm">
    </div>

    <div class="col-md-7">
        <h2 class="font-weight-bold">{{ $sach->tieu_de }}</h2>

        <p class="text-danger h4">
            {{ number_format($sach->gia_ban, 0, ',', '.') }}đ
        </p>

        <hr>

        <p>Nhà cung cấp: <b>{{ $sach->nha_cung_cap }}</b></p>
        <p>Nhà xuất bản: <b>{{ $sach->nha_xuat_ban }}</b></p>
        <p>Tác giả: <b>{{ $sach->tac_gia }}</b></p>
        <p>Hình thức bìa: <b>{{ $sach->hinh_thuc_bia }}</b></p>

        <hr>

        <p><strong>Mô tả:</strong></p>
        <div style="line-height:1.8; text-align:justify;">
            {{ $sach->mo_ta }}
        </div>

        <br>

        <div>
            Số lượng:
            <input type="number" id="product-number" value="1" min="1">
        </div>

        <br>

        <button class="btn btn-danger" id="add-to-cart">
            Thêm vào giỏ hàng
        </button>
    </div>
</div>

<script>
$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#add-to-cart").click(function(e){
        e.preventDefault();

        let id = "{{$sach->id}}";
        let num = $("#product-number").val();

        $.ajax({
            type: "POST",
            url: "{{ route('cartadd') }}",
            data: { id: id, num: num },
            dataType: "json",
            success: function(response){
                console.log("Cart updated:", response);
                $("#cart-number-product").html(response.total_items);
                alert("Đã thêm vào giỏ!");
            },
            error: function(xhr){
                console.log("Lỗi thêm giỏ hàng:", xhr.responseText);
                alert("Lỗi thêm giỏ hàng!");
            }
        });
    });

});
</script>

@endsection