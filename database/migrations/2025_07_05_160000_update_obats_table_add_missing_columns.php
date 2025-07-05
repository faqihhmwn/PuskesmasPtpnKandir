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
        Schema::table('obats', function (Blueprint $table) {
            // Cek apakah kolom sudah ada sebelum menambahkan
            if (!Schema::hasColumn('obats', 'jenis_obat')) {
                $table->string('jenis_obat')->nullable()->after('nama_obat');
            }
            if (!Schema::hasColumn('obats', 'harga_satuan')) {
                $table->decimal('harga_satuan', 10, 2)->default(0)->after('jenis_obat');
            }
            if (!Schema::hasColumn('obats', 'stok_masuk')) {
                $table->integer('stok_masuk')->default(0)->after('stok_awal');
            }
            if (!Schema::hasColumn('obats', 'stok_keluar')) {
                $table->integer('stok_keluar')->default(0)->after('stok_masuk');
            }
            if (!Schema::hasColumn('obats', 'stok_sisa')) {
                $table->integer('stok_sisa')->default(0)->after('stok_keluar');
            }
            if (!Schema::hasColumn('obats', 'expired_date')) {
                $table->date('expired_date')->nullable()->after('stok_sisa');
            }
            if (!Schema::hasColumn('obats', 'keterangan')) {
                $table->text('keterangan')->nullable()->after('expired_date');
            }
            if (!Schema::hasColumn('obats', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('keterangan');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('obats', function (Blueprint $table) {
            $table->dropColumn([
                'jenis_obat', 
                'harga_satuan', 
                'stok_masuk', 
                'stok_keluar', 
                'stok_sisa', 
                'expired_date', 
                'keterangan', 
                'is_active'
            ]);
        });
    }
};
