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
        Schema::create('tbl_laporan', function (Blueprint $table) {
            $table->integer('id_laporan', true);
            $table->string('judul_laporan', 150);
            $table->text('isi_laporan');
            $table->date('tanggal_laporan');
            $table->string('image')->nullable();
            $table->integer('id_user')->nullable()->index('id_user');
            $table->integer('id_kategori')->nullable()->index('id_kategori');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_laporan');
    }
};
