<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', 'App\Http\Controllers\ViduController@sach');
// 1. Trang chủ và Trang Index - Dùng ViduLayoutController để đồng bộ với AJAX
Route::get('/', 'App\Http\Controllers\ViduLayoutController@sach');
Route::get('/index', 'App\Http\Controllers\ViduLayoutController@sach');

// 2. Thể loại (Load trang bình thường - dùng khi redirect từ trang chi tiết)
Route::get('/sach/theloai/{id}', 'App\Http\Controllers\ViduLayoutController@theloai');

// 3. Route AJAX dành riêng cho menu (Lấy dữ liệu ngầm không load lại trang)
Route::get('/ajax/sach/theloai/{id}', 'App\Http\Controllers\ViduLayoutController@sachTheoTheLoaiAjax');

// 4. Chi tiết sách (Giữ nguyên Controller riêng của nó)
Route::get('/chitietsach/{id}', 'App\Http\Controllers\SachController@chitietsach');

// --- CÁC ROUTE HỆ THỐNG (AUTH) ---
Route::get('/dashboard', function () {
    return redirect('/');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/index', 'App\Http\Controllers\ViduController@sach')->name('index');
Route::get('/bh',function(){
    return view('bh');
});

Route::get('/chitietsach/{id}', 'App\Http\Controllers\SachController@chitietsach');
Route::get('/sach/theloai/{id}', 'App\Http\Controllers\ViduController@theloai');

Route::get('/accountpanel','App\Http\Controllers\AccountController@accountpanel')
->middleware('auth')->name("account");

Route::post('/saveaccountinfo','App\Http\Controllers\AccountController@saveaccountinfo')
      ->middleware('auth')->name('saveinfo');

Route::post('/account/update', 'App\Http\Controllers\AccountController@saveaccountinfo')
    ->name('account.update');


require __DIR__.'/auth.php';

Route::get('/book/list','App\Http\Controllers\SachController@booklist')->middleware('auth')->name("booklist");
Route::get('/book/create','App\Http\Controllers\SachController@bookcreate')->middleware('auth')->name("bookcreate");
Route::get('/book/edit/{id}','App\Http\Controllers\SachController@bookedit')->middleware('auth')->name("bookedit");
Route::post('/book/save/{action}','App\Http\Controllers\SachController@booksave')->middleware('auth')->name("booksave");
Route::post('/book/delete','App\Http\Controllers\SachController@bookdelete')->middleware('auth')->name("bookdelete");

Route::get('/order','App\Http\Controllers\SachController@order')->name('order');
Route::post('/cart/add','App\Http\Controllers\SachController@cartadd')->name('cartadd');
Route::post('/cart/delete','App\Http\Controllers\SachController@cartdelete')->name('cartdelete');
Route::post('/order/create','App\Http\Controllers\SachController@ordercreate') ->middleware('auth')->name('ordercreate');
Route::get('/testemail','App\Http\Controllers\ViduController@testemail');

require __DIR__.'/auth.php';
