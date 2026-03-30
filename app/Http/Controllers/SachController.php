<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SachController extends Controller
{

    function chitietsach($id) {
    $data2 = DB::table('sach')->where('id', $id)->get();
    return view('components.chitietsach', compact('data2'));
    }
}
