<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crawler extends Model
{
    use HasFactory;

    protected $table= "cao_bao";

    protected $fillable = ["id_nguoi_dung", "link_bai_bao", "tieu_de", "noi_dung", "hinh_anh"];

    public $timestamps = false;
}
