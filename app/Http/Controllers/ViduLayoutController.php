<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViduLayoutController extends Controller
{
    // 1. Hàm hiện FULL sách cho Trang chủ
   public function sach()
{
    // Lấy tất cả sách không điều kiện
    $data = DB::table('sach')->get(); 
    
    // SỬA Ở ĐÂY: thư mục components, file index
    return view('components.index', compact('data'));
}

    // 2. Hàm lấy sách theo Thể loại cho AJAX menu
    public function sachTheoTheLoaiAjax($id)
    {
        $data = DB::table('sach')
                    ->where('the_loai', $id) 
                    ->get();
        return response()->json($data);
    }
    
    // 3. Hàm lấy sách theo Thể loại khi load lại trang (nếu cần)
 public function theloai($id)
{
    $data = DB::table('sach')->where('the_loai', $id)->get();
    
    // SỬA Ở ĐÂY LUÔN
    return view('components.index', compact('data'));
}
}