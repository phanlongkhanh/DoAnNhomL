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
            $table->decimal('price', 10, 2)->nullable();
            $table->unsignedBigInteger('amount')->comment('số lượng');
            $table->string('image');
            $table->decimal('total_price',10, 2)->comment('thành tiền');
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
