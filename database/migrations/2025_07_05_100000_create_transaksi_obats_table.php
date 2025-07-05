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
        Schema::create('transaksi_obats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('obat_id')->constrained('obats')->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('jumlah_keluar')->default(0);
            $table->integer('jumlah_masuk')->default(0);
            $table->decimal('total_biaya', 15, 2)->default(0);
            $table->enum('tipe_transaksi', ['masuk', 'keluar']);
            $table->text('keterangan')->nullable();
            $table->string('petugas')->nullable();
            $table->timestamps();
            
            // Index untuk optimasi query
            $table->index(['obat_id', 'tanggal']);
            $table->index('tanggal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_obats');
    }
};
