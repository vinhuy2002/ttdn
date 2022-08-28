<?php

namespace App\Http\Controllers;

use App\Models\Crawler;
use App\Models\NguoiDung as ModelsNguoiDung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class NguoiDung extends Controller
{

    public function loginIndex(){
        return view('auth.login');
    }

    public function regIndex(){
        return view('auth.register');
    }

    public function loginReq(Request $request){
        $request->validate([
            "tenTK" => "required",
            "matKhau" => "required",
        ]);
        $pass = ($request->matKhau);
        if (Auth::guard("nguoi_dung")->attempt(["tai_khoan" => $request->tenTK, "password" => $pass])){
            $test = ModelsNguoiDung::where('tai_khoan', $request->tenTK)->first();
            $request->session()->put('dangnhap', $test['ho_va_ten']);
            $request->session()->put('id_dang_nhap', $test['id_nguoi_dung']);
            return redirect()->intended("");
        }
        return redirect(route("loginIndex"));
    }

    public function registerReq(Request $request){
        $request->validate([
            "hoVaTen" => "required",
            "tenTK" => "required|unique:nguoi_dung,tai_khoan",
            "matKhau" => "required|min:6",
            "matKhauConfirm" => "required|same:matKhau"
        ]);

        $data = $request->all();

        $pass = Hash::make($data["matKhau"]);
        ModelsNguoiDung::create([
            "ho_va_ten" => $data["hoVaTen"],
            "tai_khoan" => $data["tenTK"],
            "password" => $pass,
        ]);
        return redirect("");
    }


    public function delete($id){
        $hinhanh = Crawler::where("id_bao", $id)->value('hinh_anh');
        $data = json_decode($hinhanh);

        foreach ($data as $i){
            if ($i!=null)
            {
                $ex = explode("http://127.0.0.1:8080/images/", $i);
                unlink(public_path('image-store/'.$ex[1]));
            }
        }
        Crawler::where("id_bao", $id)->delete();
        return redirect(route("dashboard"));
    }

    public function dashboard(){
        if(session()->has('dangnhap')){
            $data = (Crawler::where("id_nguoi_dung", session('id_dang_nhap'))->get());

            return view('dashboard.trangchu.trangchu', ['data' => $data]);
        } else {
            return redirect("");
        }
    }

    public function logout(Request $request){
        Auth::logout();
        session()->pull('dangnhap');
        session()->pull('id_dang_nhap');
        $request->session()->invalidate();
        return redirect("");
    }
}
