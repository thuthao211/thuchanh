<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', $title ?? 'Nhà Sách')</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>

<!-- HEADER -->
<header style="text-align:center">
    <img src="{{ asset('hinh/banner_sach.jpg') }}" width="1000px">
</header>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg" style="background-color:#ff5850;">
    <div class="container" style="width:1000px">

        <!-- MENU -->
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

        <!-- RIGHT SIDE -->
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

                    <div id="cart-number-product">
                        {{ session('cart') ? array_sum(session('cart')) : 0 }}
                    </div>
                </div>
            </a>

            @auth
               @auth
    <div class="dropdown">
        <button class="btn btn-success dropdown-toggle" data-toggle="dropdown">
            {{ Auth::user()->name }}
        </button>

        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route('account') }}">Quản lý</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="dropdown-item" type="submit">Đăng xuất</button>
            </form>
        </div>
    </div>
@endauth
            @else
                <a href="{{ route('login') }}">
                    <button class="btn btn-primary btn-sm mr-2">Đăng nhập</button>
                </a>
                <a href="{{ route('register') }}">
                    <button class="btn btn-success btn-sm">Đăng ký</button>
                </a>
            @endauth

        </div>
    </div>
</nav>

<!-- CONTENT -->
<main style="width:1000px; margin:10px auto;">
    @yield('content')
</main>


</body>

<style>
.navbar { background-color: #ff5850; }
.nav-link { color: #fff !important; font-weight: bold; }
.nav-link:hover { background-color: #e04840; }

/* GRID BOOK */
.list-book {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
}
.book {
    text-align: center;
}
.book img {
    width: 100%;
    height: 200px;
    object-fit: contain;
}
.book i {
    color: #ff5850;
    font-weight: bold;
}
</style>

</html>