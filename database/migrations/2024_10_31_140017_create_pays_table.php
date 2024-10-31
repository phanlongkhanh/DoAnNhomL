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
        Schema::create('pays', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->comment('thông tin người mua');
            $table->unsignedBigInteger('id_transport')->comment('đơn vị vận chuyển');
            $table->unsignedBigInteger('id_payment')->comment('phương thức thanh toán');
            $table->string('status')->default('Đã tiếp nhận')->comment('tình trạng đơn hàng');
            $table->string('name')->comment('tên sản phẩm');
            $table->string('phone')->comment('Số điện thoại');
            $table->unsignedBigInteger('amount')->comment('số lượng');
            $table->decimal('price',10,2)->comment('giá tiền');
            $table->string('description')->comment('nội dung cần thêm');
            $table->string('address')->comment('địa chỉ');
            $table->decimal('total_price',10,2)->comment('tổng tiền');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pays');
    }
};
