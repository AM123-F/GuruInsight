<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip')->unique();
            $table->string('password');
            $table->unsignedBigInteger('mapel_id')->nullable();  // Menambahkan nullable()
            $table->timestamps();
    
            // Menambahkan foreign key yang merujuk ke kolom id pada tabel mapels
            $table->foreign('mapel_id')->references('id')->on('mapels')->onDelete('set null');
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('gurus');
    }
}  