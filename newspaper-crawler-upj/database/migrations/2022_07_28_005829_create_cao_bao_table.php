<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cao_bao', function (Blueprint $table) {
            $table->id("id_bao");
            $table->unsignedBigInteger("id_nguoi_dung");
            $table->foreign("id_nguoi_dung")->references("id_nguoi_dung")->on("nguoi_dung")->onDelete("cascade");
            $table->text("link_bai_bao");
            $table->text("tieu_de");
            $table->text("noi_dung");
            $table->text("hinh_anh")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cao_bao');
    }
};
