<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title')</title>
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