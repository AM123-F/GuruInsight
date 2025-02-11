<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('dokumens', function (Blueprint $table) {
            $table->foreignId('mapel_id')->constrained('mapels')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('dokumens', function (Blueprint $table) {
            $table->dropForeign(['mapel_id']);
            $table->dropColumn('mapel_id');
        });
    }
    
};
