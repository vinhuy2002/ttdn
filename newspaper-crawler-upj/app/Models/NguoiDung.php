<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NguoiDung extends Authenticatable
{
    use Notifiable, HasFactory, HasApiTokens;

    protected $guard = "nguoi_dung";

    protected $table= "nguoi_dung";

    protected $fillable = ["ho_va_ten", "tai_khoan", "password"];

    protected $hidden = ["password", "remember_token"];

    public $timestamps = false;

}
