<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TestSendEmail;
use App\Models\User;

class ViduController extends Controller
{
    // --- Hiển thị sách trên trang chủ ---
    public function sach()
    {
        $data = DB::table('sach')->orderBy('gia_ban', 'asc')->limit(8)->get();
        return view("components.index", compact("data"));
    }

    // --- Hiển thị sách theo thể loại ---
    public function theloai($id)
    {
        $data = DB::table('sach')->where('the_loai', $id)->get();

        $title = "";
        if($id == 1) $title = "Tiểu thuyết";
        if($id == 2) $title = "Truyện ngắn - tản văn";
        if($id == 3) $title = "Tác phẩm kinh điển";

        return view("components.index", compact("data","title"));
    }

    public function testemail()
{
    $user = User::find(2);

    $donHang = DB::table('chi_tiet_don_hang as c')
                ->join('sach as s', 'c.sach_id', '=', 's.id')
                ->where('c.ma_don_hang', 7)
                ->select('s.*', 'c.so_luong')
                ->get();

    $quantity = [];
    foreach ($donHang as $item) {
        $quantity[$item->id] = $item->so_luong;
    }

    try {
        $user->notify(new TestSendEmail($donHang, $quantity));
        return "Email đã được gửi thành công! ";
    } catch (\Exception $e) {
        return "Lỗi gửi mail: " . $e->getMessage();
    }
}

}