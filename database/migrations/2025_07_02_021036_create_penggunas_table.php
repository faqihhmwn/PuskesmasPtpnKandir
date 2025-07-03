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
    Schema::create('penggunas', function (Blueprint $table) {
        $table->id();
        $table->string('id_pengguna')->unique();
        $table->string('nama');
        $table->string('jabatan');
        $table->date('tgl_lahir');
        $table->integer('umur');
        $table->string('jenis_kelamin');
        $table->string('agama');
        $table->string('pendidikan');
        $table->string('no_hp');
        $table->string('email')->unique();
        $table->text('alamat');
        $table->string('jadwal');
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
        Schema::dropIfExists('penggunas');
    }
};
