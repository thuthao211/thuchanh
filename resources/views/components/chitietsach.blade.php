@extends("components.layout_sach")

@section("title","Chi tiết sách")

@section("content")
<style>
    .grid-container{
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 15px;
    }
</style>

<div>
@foreach($data2 as $row)
    <div>
        <h3>{{ $row->tieu_de }}</h3><br/>

        <div class="grid-container">
            <div>
                <img src="{{ asset('hinh/image/'.$row->file_anh_bia) }}" width="200px" height="200px"><br>
            </div>

            <div>
                Nhà cung cấp: <b>{{ $row->nha_cung_cap }}</b><br/>
                Nhà xuất bản: <b>{{ $row->nha_xuat_ban }}</b><br/>
                Tác giả: <b>{{ $row->tac_gia }}</b><br/>
                Hình thức bìa: <b>{{ $row->hinh_thuc_bia }}</b><br/>
            </div>
        </div>
        <div class='mt-1'>
            Số lượng mua:
            <input type='number' id='product-number' size='5' min="1" value="1">
            <button class='btn btn-success btn-sm mb-1' id='add-to-cart'><a href="{{url('/order')}}">Thêm vào giỏ hàng</button></a>

        </div>
        <div>
            <b>Mô tả:</b><br>
            {{ $row->mo_ta }}
        </div>
    </div>
@endforeach
</div>
<script>
    $(document).ready(function(){
        $("#add-to-cart").click(function(){
            id = "{{$row->id}}";
            num = $("#product-number").val()
            $.ajax({
                type:"POST",
                dataType:"json",
                url: "{{route('cartadd')}}",
                data:{"_token": "{{ csrf_token() }}","id":id,"num":num},
                beforeSend:function(){
            },
            success:function(data){
                $("#cart-number-product").html(data);
            },
            error: function (xhr,status,error){
            },
            complete: function(xhr,status){
            }
        });
    });
});
</script>
@endsection