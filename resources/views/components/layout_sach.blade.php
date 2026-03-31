<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
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
            <div style='color:white;position:relative' class='mr-2'>
              <div style='width:20px; height:20px;background-color:#23b85c; font-size:12px; border:none;
                    border-radius:50%; position:absolute;right:2px;top:-2px' id='cart-number-product'>
              @if (session('cart'))
                  {{ count(session('cart')) }}
              @else
                0
              @endif
              </div>
              <a href="{{route('order')}}" style='cursor:pointer;color:white;'>
                <i class="fa fa-cart-arrow-down fa-2x mr-2 mt-2" aria-hidden="true"></i>
              </a>
            </div>
          </nav>
          <img src="{{asset('hinh/sidebar_1.jpg')}}" width="100%" class='mt-1'>
          <img src="{{asset('hinh/sidebar_2.jpg')}}" width="100%" class='mt-1'>
        </div>
        <div class='col-9'>
          @yield('content')
        </div>
      </div>
    </main>
  </body>
</html>