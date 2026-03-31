<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\ViduController@sach');

Route::get('/dashboard', function () {
    return redirect('/');
});

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

Route::get('/accountpanel','App\Http\Controllers\AccountController@accountpanel')
->middleware('auth')->name("account");

Route::post('/saveaccountinfo','App\Http\Controllers\AccountController@saveaccountinfo')
      ->middleware('auth')->name('saveinfo');

Route::post('/account/update', 'App\Http\Controllers\AccountController@saveaccountinfo')
    ->name('account.update');


require __DIR__.'/auth.php';
