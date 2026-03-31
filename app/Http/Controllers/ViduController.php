<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TestSendEmail;
use App\Models\User;



class ViduController extends Controller
{
    
    public function sach()
    {
    $data = DB::select("select * from sach order by gia_ban asc limit 0,8");
    return view("components.index", compact("data"));
    }
    
    
    public function theloai($id)
{
    $data = DB::select("select * from sach where the_loai = ?",[$id]);

    $title = "";
    if($id == 1) $title = "Tiểu thuyết";
    if($id == 2) $title = "Truyện ngắn - tản văn";
    if($id == 3) $title = "Tác phẩm kinh điển";

    return view("components.index", compact("data","title"));
}
 
    public function testemail()
    {
        $user = User::find(2);
             $donHang = DB::select("select * from chi_tiet_don_hang c, sach s
                                         where c.sach_id = s.id
                                         and c.ma_don_hang = 7");

     $user->notify(new TestSendEmail($donHang));

    }


}
