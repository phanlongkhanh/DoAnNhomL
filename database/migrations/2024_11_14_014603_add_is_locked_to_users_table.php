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
        // Kiểm tra nếu cột `is_locked` chưa tồn tại
        if (!Schema::hasColumn('users', 'is_locked')) {
            Schema::table('users', function (Blueprint $table) {
                $table->boolean('is_locked')->default(false); // Thêm cột is_locked với giá trị mặc định là false
            });
        }
    }
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_locked'); // Xóa cột is_locked nếu rollback
        });
    }
};
    