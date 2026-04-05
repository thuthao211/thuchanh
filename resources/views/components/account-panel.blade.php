<head>
    <style>
    body {
        background: #f5f6fa;
    }

    .row {
        display: grid;
        grid-template-columns: 250px 1fr;
        gap: 20px;
    }
    .alert {
        padding: 12px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .alert-success {
        background: #d4edda;
        color: #155724;
    }

    form {
        max-width: 400px;
        margin: 0 auto;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        display: block;
        margin: 10px auto 0;
        background: #007bff;
        color: white;
        border: none;
        padding: 8px 25px;
        border-radius: 4px;
        cursor: pointer;
    }

    </style>
</head>
<body>
<div style="width:1000px; margin:10px auto;">

<div style="padding:10px; font-weight:bold;">
    <a href="{{ url('/') }}" style="text-decoration:none; color:black;">
        Trang chủ
    </a>
</div>

    <div class="row">

        <div class="col-3">
            <div style="background:#3c4b64; min-height:300px; padding:10px;">

                <a href="{{route('account')}}" 
                   style="display:block; color:white; padding:8px; text-decoration:none;">
                   Thông tin tài khoản
                </a>

                <a href="{{ url('/book/list')}}" 
                   style="display:block; color:white; padding:8px; text-decoration:none;">
                   Quản lý sách
                </a>

            </div>
        </div>

        <div class="col-9">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            {{$slot}}

        </div>

    </div>

</div>
</body>