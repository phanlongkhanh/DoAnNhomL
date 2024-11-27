<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('id_user')->comment('người mua');
            $table->unsignedBigInteger('id_pays')->comment('thông tin đơn hàng');
            $table->string('status')->default('Đã tiếp nhận')->comment('tình trạng đơn hàng');
            $table->unsignedBigInteger('amount')->comment('số lượng');
            $table->unsignedBigInteger('intomoney')->comment('thành tiền');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
