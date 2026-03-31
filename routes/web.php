<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';