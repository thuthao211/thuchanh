<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/thuthao', function () {
    return view('ten');
});

Route::get('/index','App\Http\Controllers\ViduController@sach');
Route::get('/bh',function(){
    return view('bh');
});

Route::get('/chitietsach/{id}', 'App\Http\Controllers\SachController@chitietsach');
Route::get('/sach/theloai/{id}', 'App\Http\Controllers\ViduController@theloai');
require __DIR__.'/auth.php';
Route::get('/order','App\Http\Controllers\SachController@order')->name('order');
Route::post('/cart/add','App\Http\Controllers\SachController@cartadd')->name('cartadd');
Route::post('/cart/delete','App\Http\Controllers\SachController@cartdelete')->name('cartdelete');
Route::post('/order/create','App\Http\Controllers\SachController@ordercreate') ->middleware('auth')->name('ordercreate');