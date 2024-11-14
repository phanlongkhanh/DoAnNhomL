<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Kiểm tra nếu cột chưa tồn tại trước khi thêm
        if (!Schema::hasColumn('users', 'checkactive')) {
            Schema::table('users', function (Blueprint $table) {
                $table->boolean('checkactive')->default(true);
            });
        }
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('checkactive'); 
        });
    }
};
