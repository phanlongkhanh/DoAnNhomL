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
        Schema::create('pay', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_product')->comment('thông tin sản phẩm');
            $table->unsignedBigInteger('id_user')->comment('thông tin người mua');
            $table->unsignedBigInteger('id_transport')->comment('đơn vị vận chuyển');
            $table->unsignedBigInteger('id_payment')->comment('phương thức thanh toán');
            $table->string('description')->comment('đơn vị vận chuyển');
            $table->string('address')->comment('địa chỉ');
            $table->string('name')->comment('tên sản phẩm');
            $table->decimal('price', 10, 2)->nullable()->comment('giá tiền');
            $table->unsignedBigInteger('amount')->comment('số lượng');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pay');
    }
};
