<?php

use App\Http\Controllers\Crawler;
use App\Http\Controllers\NguoiDung;
use App\Http\Controllers\TrangChinh;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Weidner\Goutte\GoutteFacade;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [TrangChinh::class, 'trangChu']);

Route::get('/', [Crawler::class, 'crawler']);

Route::get('/huong-dan', [TrangChinh::class, 'huongDan'])->name('huongDan');
Route::get('/the-loai', [TrangChinh::class, 'theLoai'])->name('theLoai');
Route::get('/cao-the-loai', [Crawler::class, 'crawlCat'])->name('theloai');

Route::get('/dang-nhap', [NguoiDung::class, 'loginIndex'])->name('loginIndex');
Route::post('/dang-nhap-tc', [NguoiDung::class, 'loginReq'])->name('loginReq');
Route::get('/dang-ky', [NguoiDung::class, 'regIndex'])->name('regIndex');
Route::post('/dang-ky-tc', [NguoiDung::class, 'registerReq'])->name('regReq');
Route::get('/dang-xuat', [NguoiDung::class, 'logout'])->name('logout');
Route::get('/dashboard', [NguoiDung::class, 'dashboard'])->name('dashboard');

Route::post('/luu-tc', [Crawler::class, 'store'])->name('store');
Route::get('/dashboard/xoa/id={id}', [NguoiDung::class, 'delete']);
Route::post('/luu-the-loai-tc', [Crawler::class, 'crawlCatStore']);

