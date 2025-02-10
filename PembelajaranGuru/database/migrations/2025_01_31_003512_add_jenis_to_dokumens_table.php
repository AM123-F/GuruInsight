<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJenisToDokumensTable extends Migration
{
    public function up()
    {
        Schema::table('dokumens', function (Blueprint $table) {
            $table->string('jenis', 100)->after('judul'); // Menambahkan kolom 'jenis'
        });
    }

    public function down()
    {
        Schema::table('dokumens', function (Blueprint $table) {
            $table->dropColumn('jenis');
        });
    }
}
