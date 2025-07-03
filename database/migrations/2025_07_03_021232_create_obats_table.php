<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('obats', function (Blueprint $table) {
        $table->id();
        $table->string('nama_obat');
        $table->string('satuan')->nullable();
        $table->integer('stok_awal')->default(0);
        $table->integer('masuk')->default(0);
        $table->integer('keluar')->default(0);
        $table->integer('sisa')->default(0);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obats');
    }
};
