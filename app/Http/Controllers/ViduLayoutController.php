<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViduLayoutController extends Controller
{
    function trang1()
    {
    return view('components.layout_sach');
    }
}
