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
            $table->foreign(['id_user'])
                ->references(['id_user'])
                ->on('users')
                ->onDelete('cascade');
            $table->foreign(['id_kategori'], 'tbl_laporan_ibfk_2')->references(['id_kategori'])->on('tbl_kategori')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_laporan', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropForeign('tbl_laporan_ibfk_2');
        });
    }
};
