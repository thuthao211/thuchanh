<head>
    <title>Quản lý sách</title>
    <style>
        body { font-family: Arial; margin:0; }

        .container { display:flex; }

        .sidebar {
            width:200px;
            background:#3c4a63;
            color:white;
            padding:15px;
            height:100vh;
        }

        .sidebar a {
            display:block;
            color:white;
            text-decoration:none;
            margin:10px 0;
        }

        .content {
            flex:1;
            padding:20px;
        }

        table {
            width:100%;
            border-collapse:collapse;
        }

        th, td {
            border:1px solid #ccc;
            padding:6px;
        }

        th { background:#eee; }

        .action {
            width:100px;
            text-align:center;
        }
        
        .btn-add {
            background: green;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }

        .btn-edit {
            background: #17a2b8;
            color: white;
            padding: 3px 8px;
            border: none;
            cursor: pointer;
        }

        .btn-delete {
            background: red;
            color: white;
            padding: 3px 8px;
            border: none;
            cursor: pointer;
        }
        .trang {
            padding: 15px 20px; 
            border-bottom: 1px solid #eee; 
            font-weight: bold; 
            background: #fff; font-size: 14px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="sidebar">
        <a href="{{url('/accountpanel')}}">Thông tin tài khoản</a>
        <a href="/book/list">Quản lý sách</a>
    </div>

    <div class="content">
        <div><a href="{{ url('/index') }}" >Trang chủ</div>
        <h3 style="text-align:center;">QUẢN LÝ SÁCH</h3>

        <a href="{{ route('bookcreate') }}">
            <button class="btn-add">Thêm</button>
        </a>
     
        <br><br>

        @if(session('status'))
            <div class="alert alert-success" style="color:green; margin-bottom: 10px;">
                {{ session('status') }}
            </div>
        @endif

        <table id="book-table">
            <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>NXB</th>
                    <th>NCC</th>
                    <th>Tác giả</th>
                    <th>Hình thức bìa</th> <th>Giá bán</th>
                    <th>Hình ảnh</th>
                    <th class="action">Thao tác</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($data as $row)
                <tr>
                    <td>{{ $row->tieu_de }}</td>
                    <td>{{ $row->nha_xuat_ban }}</td>
                    <td>{{ $row->nha_cung_cap }}</td>
                    <td>{{ $row->tac_gia }}</td>
                    <td>{{ $row->hinh_thuc_bia }}</td> <td>{{ $row->gia_ban }}</td>

                    <td>
                        <img src="{{ asset('storage/hinh/image/'.$row->file_anh_bia) }}" width="50px">
                    </td>

                    <td class="action">
                        <a href="{{ route('bookedit',['id'=>$row->id]) }}">
                            <button class="btn-edit">Sửa</button>
                        </a>
                        
                        <form method="post" action="{{ route('bookdelete') }}" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa cuốn sách này không?');">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $row->id }}">
                            <button type="submit" class="btn-delete">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>

</body>

<script>
$(document).ready(function(){
    $('#book-table').DataTable({
        responsive: true,
        "bStateSave": true
    });
});
</script>