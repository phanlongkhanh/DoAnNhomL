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
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('id_product')->comment('thông tin sản phẩm');
            $table->string('name')->comment('tên sản phẩm');
            $table->unsignedBigInteger('amount')->comment('số lượng');
            $table->string('image');
            $table->unsignedBigInteger('total_price')->comment('thành tiền');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
