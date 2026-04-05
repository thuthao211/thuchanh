<x-account-panel>

@if ($errors->any())
    <div style='color:red;width:30%; margin:0 auto'>
      <div >
        {{ __('Whoops! Something went wrong.') }}
      </div>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
  @endif

<form method="post" action="{{route('saveinfo')}}" 
      enctype="multipart/form-data"
      style="width:30%; margin:0 auto">

    @csrf

    <div style='text-align:center;font-weight:bold;color:#15c;'>
        CẬP NHẬT THÔNG TIN CÁ NHÂN <br> <br>
    </div>

    <label>Tên</label>
    <input type="text" class="form-control" name="name" value="{{$user->name}}">

    <label>Email</label>
    <input type="text" class="form-control" name="email" value="{{$user->email}}">

    <label>Số điện thoại</label>
    <input type="text" class="form-control" name="phone" value="{{$user->phone}}">

    <input type="hidden" name="id" value="{{$user->id}}">

    @if($user->photo)
        <img src="{{asset('storage/profile/'.$user->photo)}}" width="80px" class="mb-2">
    @endif

    <label>Ảnh đại diện</label>
    <input type="file" name="photo" class="form-control-file">

    <div style="text-align:center; margin-top:10px">
        <button class="btn btn-primary">Lưu</button>
    </div>

</form>

</x-account-panel>