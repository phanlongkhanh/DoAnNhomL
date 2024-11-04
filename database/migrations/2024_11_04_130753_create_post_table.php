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
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_list_post')->comment('danh mục bài viết');
            $table->string('name')->comment('người viết');
            $table->text('description')->comment('mô tả bài viết');
            $table->string('image')->comment('ảnh đại diện');
            $table->longText('content')->comment('nội dung bài viết');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
