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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('nama');
            $table->text('moto');
            $table->text('tentang_saya');
            $table->string('jurusan');
            $table->string('ajakan');
            $table->text('ig');
            $table->text('tw');
            $table->text('tk');
            $table->text('git');
            $table->text('fb');
            $table->text('yt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
