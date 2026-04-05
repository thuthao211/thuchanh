@extends("components.layout_sach")

@section("title", "Đặt hàng")

@section("content")
<style>
    .book-table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
    }
    .book-table th, .book-table td {
        border: 1px solid #ddd;
        padding: 8px;
    }
    .book-table th {
        background-color: #f2f2f2;
        text-align: center;
    }
</style>

<div>
    <div style='color:#15c; font-weight:bold; font-size:18px; text-align:center; margin-bottom: 20px;'>
        DANH SÁCH SẢN PHẨM TRONG GIỎ HÀNG
    </div>
    
    <table class='book-table' style='margin:0 auto; width:90%'>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sách</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            @php $tongTien = 0; @endphp
            @foreach($data as $key => $row)
                @php 
                    $thanhTien = $row->gia_ban * $quantity[$row->id];
                    $tongTien += $thanhTien;
                @endphp
                <tr>
                    <td align='center'>{{ $key + 1 }}</td>
                    <td>{{ $row->tieu_de }}</td>
                    <td align='center'>{{ $quantity[$row->id] }}</td>
                    <td align='center'>{{ number_format($row->gia_ban, 0, ',', '.') }}đ</td>
                    <td align='center'>{{ number_format($thanhTien, 0, ',', '.') }}đ</td>
                    <td align='center'>
                        <form method='post' action="{{ route('cartdelete') }}">
                            @csrf
                            <input type='hidden' value='{{ $row->id }}' name='id'>
                            <input type='submit' class='btn btn-sm btn-danger' value='Xóa'>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan='4' align='right'><b>Tổng cộng</b></td>
                <td align='center'><b>{{ number_format($tongTien, 0, ',', '.') }}đ</b></td>
                <td></td>
            </tr>
        </tbody>
    </table>
   
    <div style='font-weight:bold; width:70%; margin:20px auto; text-align:center;'>
        @auth
            @if(count($data) > 0)
                <form method='post' action="{{ route('ordercreate') }}">
                    @csrf
                    <label>Hình thức thanh toán</label><br>
                    <div class='d-inline-flex'>
                        <select name='hinh_thuc_thanh_toan' class='form-control form-control-sm'>
                            <option value='1'>Tiền mặt</option>
                            <option value='2'>Chuyển khoản</option>
                            <option value='3'>Thanh toán VNPay</option>
                        </select>
                    </div><br>
                    <input type='submit' class='btn btn-primary mt-2' value='XÁC NHẬN ĐẶT HÀNG'>
                </form>
            @else
                <div class="alert alert-warning">Giỏ hàng trống. Vui lòng chọn sản phẩm cần mua!</div>
            @endif
        @else
            <div class="alert alert-danger">Vui lòng <a href="{{ route('login') }}">đăng nhập</a> trước khi đặt hàng</div>
        @endauth
    </div>
</div>
@endsection