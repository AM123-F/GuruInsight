<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateJudulColumnInDokumensTable extends Migration
{
    public function up()
    {
        Schema::table('dokumens', function (Blueprint $table) {
            $table->string('judul')->default('Dokumen Tanpa Judul')->change();
        });
    }

    public function down()
    {
        Schema::table('dokumens', function (Blueprint $table) {
            $table->string('judul')->change();
        });
    }
}
