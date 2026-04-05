<<<<<<< HEAD
<h2>Cảm ơn bạn đã đặt hàng!</h2>
<table border="1" cellspacing="0" cellpadding="10">
    <thead>
        <tr style="background: #eee;">
            <th>Tên sách</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0; @endphp
        @foreach($data as $item)
        <tr>
            <td>{{ $item->ten_sach }}</td>
            <td>{{ $item->so_luong }}</td>
            <td>{{ number_format($item->don_gia) }}đ</td>
            <td>{{ number_format($item->so_luong * $item->don_gia) }}đ</td>
        </tr>
        @php $total += $item->so_luong * $item->don_gia; @endphp
        @endforeach
        <tr>
            <td colspan="3"><b>Tổng tiền</b></td>
            <td><b>{{ number_format($total) }}đ</b></td>
        </tr>
    </tbody>
</table>
=======
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body style="font-family: Arial, sans-serif; color: #333;">

    <h3 style="color: #0056b3; text-align: center;">THÔNG TIN ĐƠN HÀNG</h3>
    
    <table border="1" cellspacing="0" cellpadding="8" style="width: 80%; margin: 0 auto; border-collapse: collapse; text-align: center;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th>STT</th>
                <th>Tên sách</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
            </tr>
        </thead>
        <tbody>
            @php
                $tong_cong = 0;
            @endphp
            
            @foreach($data as $key => $item)
                @php
                    $tong_cong += $item->don_gia * $item->so_luong;
                @endphp
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td style="text-align: left;">{{ $item->tieu_de }}</td>
                    <td>{{ $item->so_luong }}</td>
                    <td>{{ number_format($item->don_gia, 0, ',', '.') }}đ</td>
                </tr>
            @endforeach
            
            <tr>
                <td colspan="3" style="font-weight: bold; text-align: center;">Tổng cộng</td>
                <td style="font-weight: bold; color: #d9534f;">{{ number_format($tong_cong, 0, ',', '.') }}đ</td>
            </tr>
        </tbody>
    </table>

</body>
</html>
>>>>>>> remotes/origin/thachthao
