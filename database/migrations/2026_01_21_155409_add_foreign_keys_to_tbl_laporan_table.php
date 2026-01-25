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
        Schema::table('tbl_laporan', function (Blueprint $table) {
            $table->foreign(['id_user'], 'tbl_laporan_ibfk_1')->references(['id_user'])->on('tbl_user')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_kategori'], 'tbl_laporan_ibfk_2')->references(['id_kategori'])->on('tbl_kategori')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_laporan', function (Blueprint $table) {
            $table->dropForeign('tbl_laporan_ibfk_1');
            $table->dropForeign('tbl_laporan_ibfk_2');
        });
    }
};
