<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('penilaian', function (Blueprint $table) {

            $table->string('nama_usaha')
                  ->nullable()
                  ->after('nama');

            $table->text('alamat_usaha')
                  ->nullable()
                  ->after('nama_usaha');

            $table->integer('rating')
                  ->nullable()
                  ->after('komentar');

        });
    }

    public function down(): void
    {
        Schema::table('penilaian', function (Blueprint $table) {

            $table->dropColumn([
                'nama_usaha',
                'alamat_usaha',
                'rating'
            ]);

        });
    }
};