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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->boolean('checkactive')->default(true)->comment('Check hoạt động');
            $table->string('image');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
        });
    }
   
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
};
