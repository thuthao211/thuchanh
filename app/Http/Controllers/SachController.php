<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TestSendEmail;
use App\Models\User;

class SachController extends Controller
{
    // --- Hiển thị chi tiết sách ---
    public function chitietsach($id)
    {
        $sach = DB::table('sach')->where('id', $id)->first();
        if(!$sach){
            abort(404, "Sách không tồn tại");
        }
        return view('components.chitietsach', compact('sach'));
    }

    public function booklist(){
        $data = DB::table("sach")->get();
        return view("vidusach.book_list",compact("data"));
    }

    public function bookcreate(){
        $the_loai = DB::table("dm_the_loai")->get();
        $action = "add";
        return view("vidusach.book_form",compact("the_loai","action"));
    }

    public function bookedit($id){
        $action = "edit";
        $the_loai = DB::table("dm_the_loai")->get();
        $sach = DB::table("sach")->where("id",$id)->first();
        return view("vidusach.book_form",compact("the_loai","action","sach"));
    }

    
    public function booksave($action, Request $request)
    {
        $request->validate([
            'tieu_de' => ['required', 'string', 'max:200'],
            'nha_cung_cap' => ['required', 'string', 'max:50'],
            'nha_xuat_ban' => ['required', 'string', 'max:50'],
            'tac_gia' => ['required', 'string', 'max:50'],
            'hinh_thuc_bia' => ['required', 'string', 'max:50'],
            'gia_ban' => ['required', 'numeric'],
            'the_loai' => ['required', 'max:3'],
            'file_anh_bia' => ['nullable','image']
        ]);
        
        $data = $request->except("_token");
        
        if($action=="edit") {
            $data = $request->except("_token", "id");
        }

        if($request->hasFile("file_anh_bia"))
        {
            $fileName = $request->input("tieu_de") ."_".rand(1000000,9999999).'.' . $request->file('file_anh_bia')->extension();    
            $request->file('file_anh_bia')->storeAs('public/book_image', $fileName);
            $data['file_anh_bia'] = $fileName;
        }
        
        $message = "";
        
        if($action=="add")
        {
            DB::table("sach")->insert($data);
            $message = "Thêm thành công";
        }
        else if($action=="edit")
        {
            $id = $request->id;
            DB::table("sach")->where("id",$id)->update($data);
            $message = "Cập nhật thành công";
        }
        
        return redirect()->route('booklist')->with('status', $message);
    }

    
    public function bookdelete(Request $request)
    {
        $id = $request->id;
        DB::table("sach")->where("id", $id)->delete();
        return redirect()->route('booklist')->with('status', "Xóa thành công");
    }
    // --- Hiển thị giỏ hàng ---
    public function order()
    {
        $cart = session('cart', []);
        $quantity = $cart;

        if(!empty($cart)){
            $data = DB::table('sach')->whereIn('id', array_keys($cart))->get();
        } else {
            $data = collect();
        }

        return view('components.order', compact('data', 'quantity'));
    }

    public function cartadd(Request $request)
{
    $id = $request->id;
    $num = max(1, (int)$request->num);

    $cart = session('cart', []);

    if(isset($cart[$id])){
        $cart[$id] += $num;
    } else {
        $cart[$id] = $num;
    }

    session(['cart' => $cart]);

    $totalItems = array_sum($cart); // tổng số lượng sản phẩm
    return response()->json(['total_items' => $totalItems]);
}

    // --- Xóa sản phẩm khỏi giỏ hàng ---
    public function cartdelete(Request $request)
    {
        $id = $request->id;
        $cart = session('cart', []);

        if(isset($cart[$id])){
            unset($cart[$id]);
            session(['cart' => $cart]);
        }

        return redirect()->back();
    }

   public function ordercreate(Request $request)
{
    $cart = session('cart', []);
    if(empty($cart)){
        return redirect()->back()->with('error', 'Giỏ hàng trống!');
    }

    $data = DB::table('sach')->whereIn('id', array_keys($cart))->get();

    foreach($data as $item){
        $item->so_luong = $cart[$item->id];
    }

    $user = \App\Models\User::find(2);
    $user->notify(new \App\Notifications\TestSendEmail($data));

    session()->forget('cart');

    return redirect('/')->with('success', 'Đặt hàng thành công!');
}
}