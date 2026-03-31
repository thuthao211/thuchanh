<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', $title ?? 'Nhà Sách')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .navbar { background-color: #ff5850; padding: 0; border-radius: 4px; }
        .nav-link { color: #fff !important; font-weight: bold; padding: 15px 20px !important; display: block; border-bottom: 1px solid rgba(255,255,255,0.1); cursor: pointer; }
        .nav-link:hover { background-color: #e04840; text-decoration: none; }

        /* Grid Sách - Đều hàng, không dính chữ */
        .list-book { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; padding: 20px 0; }
        .book { text-align: center; background: #fff; padding: 15px; border: 1px solid #eee; border-radius: 10px; display: flex; flex-direction: column; justify-content: space-between; height: 100%; }
        .book img { width: 100%; height: 200px; object-fit: contain; }
        .book b { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; height: 42px; margin: 10px 0; font-size: 14px; line-height: 21px; color: #333; }
        .book i { color: #ff5850; font-weight: bold; font-style: normal; font-size: 16px; }
    </style>
</head>
<body>
    <header class="text-center">
        <img src="{{ asset('hinh/banner_sach.jpg') }}" style="width: 1000px; max-width: 100%;">
    </header>

    <main style="width:1000px; margin:10px auto;">
        <div class='row'>
            <div class='col-3 pr-0'>
                <nav class="navbar navbar-light">
                    <ul class="navbar-nav w-100">
                        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Trang chủ</a></li>
                        <li class="nav-item"><a class="nav-link" href="javascript:void(0)" onclick="laySachTheoTheLoai(1, event)">Tiểu thuyết</a></li>
                        <li class="nav-item"><a class="nav-link" href="javascript:void(0)" onclick="laySachTheoTheLoai(2, event)">Truyện ngắn - tản văn</a></li>
                        <li class="nav-item"><a class="nav-link" href="javascript:void(0)" onclick="laySachTheoTheLoai(3, event)">Tác phẩm kinh điển</a></li>
                    </ul>
                </nav>
                <img src="{{ asset('hinh/sidebar_1.jpg') }}" width="100%" class='mt-2'>
                <img src="{{ asset('hinh/sidebar_2.jpg') }}" width="100%" class='mt-2'>
            </div>

            <div class='col-9'>
                {{-- Giải quyết lỗi Undefined $slot cho trang Chi tiết --}}
                @if(isset($slot))
                    {{ $slot }}
                @else
                    @yield('content')
                @endif
            </div>
        </div>
    </main>

    <script>
    function laySachTheoTheLoai(id, event) {
        if (event) { event.preventDefault(); event.stopPropagation