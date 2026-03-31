<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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