<x-layout_sach>
    <x-slot name='title'>Trang chủ - Nhà Sách</x-slot>

    <div class='list-book' id="khu-vuc-sach">
        @foreach($data as $row)
            <div class='book'>
                <a href="{{ url('chitietsach/'.$row->id) }}">
                    <img src="{{ asset('book_image/'.$row->file_anh_bia) }}">
                </a>
                <div>
                    <b>{{ $row->tieu_de }}</b>
                    <i>{{ number_format($row->gia_ban, 0, ",", ".") }}đ</i>
                </div>
            </div>
        @endforeach
    </div>
</x-layout_sach>