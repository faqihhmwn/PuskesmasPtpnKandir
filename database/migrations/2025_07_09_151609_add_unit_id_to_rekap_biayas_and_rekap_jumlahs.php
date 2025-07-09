<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('rekap_biayas', function (Blueprint $table) {
            $table->unsignedBigInteger('unit_id')->after('tahun')->nullable();
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
        });

        Schema::table('rekap_jumlahs', function (Blueprint $table) {
            $table->unsignedBigInteger('unit_id')->after('unit')->nullable();
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('rekap_biayas', function (Blueprint $table) {
            $table->dropForeign(['unit_id']);
            $table->dropColumn('unit_id');
        });

        Schema::table('rekap_jumlahs', function (Blueprint $table) {
            $table->dropForeign(['unit_id']);
            $table->dropColumn('unit_id');
        });
    }
};
