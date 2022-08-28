<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrangChinh extends Controller
{
    public function trangChu(){
        return view('index');
    }

    public function huongDan(){
        return view('huongdan');
    }

    public function theLoai(){
        return view('theloai');
    }
}
