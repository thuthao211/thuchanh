<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SachController extends Controller
{
    public function chitietsach($id)
    {
        // 1. Lấy dữ liệu sách từ DB theo ID
        $sach = DB::table('sach')->where('id', $id)->first();

        // 2. Kiểm tra nếu không tìm thấy sách thì báo lỗi hoặc quay về trang chủ
        if (!$sach) {
            return redirect('/')->with('error', 'Không tìm thấy sách!');
        }

        // 3. QUAN TRỌNG: Truyền biến 'sach' ra View
        return view('components.chitietsach', compact('sach'));
    }
}