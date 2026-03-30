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

        <div>
            <b>Mô tả:</b><br>
            {{ $row->mo_ta }}
        </div>
    </div>
@endforeach
</div>
@endsection