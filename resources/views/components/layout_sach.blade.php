<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', $title ?? 'Nhà Sách')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>

<body>
<header style="text-align:center">
    <img src="{{asset('hinh/banner_sach.jpg')}}" width="1000px">
</header>

<nav class="navbar navbar-expand-lg" style="background-color:#ff5850;">
    <div class="container" style="width:1000px">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white font-weight-bold" href="{{url('index')}}">Trang chủ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{url('sach/theloai/1')}}">Tiểu thuyết</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{url('sach/theloai/2')}}">Truyện ngắn - tản văn</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{url('sach/theloai/3')}}">Tác phẩm kinh điển</a>
            </li>
        </ul>
        <div class="ml-auto">
            <div class="ml-auto d-flex align-items-center">

    <!-- GIỎ HÀNG -->
    <a href="{{route('order')}}" style="position:relative; color:white; margin-right:15px;">
        <i class="fa fa-cart-arrow-down fa-2x"></i>

        <div style="
            width:20px;
            height:20px;
            background-color:#23b85c;
            border-radius:50%;
            position:absolute;
            right:-8px;
            top:-5px;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:12px;
            font-weight:bold;
            color:white;"
            id="cart-number-product">

            {{ session('cart') ? count(session('cart')) : 0 }}
        </div>
    </a>

@auth
    <div class="dropdown">
        <button class="btn btn-success dropdown-toggle" data-toggle="dropdown">
            {{ Auth::user()->name }}
        </button>

        <div class="dropdown-menu dropdown-menu-right">

            <!-- QUẢN LÝ -->
            <a class="dropdown-item" href="{{route('account')}}">
                Quản lý
            </a>

            <!-- ĐĂNG XUẤT -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="dropdown-item"
                   href="#"
                   onclick="event.preventDefault(); this.closest('form').submit();">
                   Đăng xuất
                </a>
            </form>
            
            

  <body>
    <header style='text-align:center'>
      <img src="{{asset('hinh/banner_sach.jpg')}}" width="1000px">
    </header>
    <main style="width:1000px; margin:2px auto;">
      <div class='row'>
        <div class='col-3 pr-0'>
          <nav class="navbar navbar-light">
            <ul class="navbar-nav">
              <li class="nav-item active">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('sach')}}">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('sach/theloai/1')}}">Tiểu thuyết</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('sach/theloai/2')}}">Truyện ngắn - tản văn</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('sach/theloai/3')}}">Tác phẩm kinh điển</a>
                </li>
            </ul>
            <div class='mr-2' style="display: inline-block;">
              <a href="{{route('order')}}" style='cursor:pointer; color:white; position:relative; display:inline-block;'>
                <i class="fa fa-cart-arrow-down fa-2x mt-2" aria-hidden="true"></i>
                <div style='width:20px; height:20px; background-color:#23b85c; font-size:12px; 
                            border-radius:50%; position:absolute; right:-5px; top:-2px;
                            display:flex; align-items:center; justify-content:center; 
                            font-weight:bold; color:white;' id='cart-number-product'>
                  @if (session('cart'))
                      {{ count(session('cart')) }}
                  @else
                      0
                  @endif
                </div>
              </a>
            </div>
          </nav>
          <img src="{{asset('hinh/sidebar_1.jpg')}}" width="100%" class='mt-1'>
          <img src="{{asset('hinh/sidebar_2.jpg')}}" width="100%" class='mt-1'>

        </div>
    </div>
@else
    <a href="{{ route('login') }}">
        <button class="btn btn-primary btn-sm">Đăng nhập</button>
    </a>
    <a href="{{ route('register') }}">
        <button class="btn btn-success btn-sm">Đăng ký</button>
    </a>
    
@endauth


</div>

    </div>
</nav>
<main style="width:1000px; margin:10px auto;">
    @yield('content')
</main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
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
        if (event) { event.preventDefault(); event.stopPropagation}}

