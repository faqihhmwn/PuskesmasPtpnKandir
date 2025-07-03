<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function lp(Request $request)
    {
        $unit = auth()->user()->unit ?? 'KANDIR';
        $bulan = now()->format('F');
        $tahun = now()->year;

        // Ambil semua kategori dari DB
        $kategoriList = DB::table('kategori')->pluck('id', 'nama')->toArray();

        // Ambil semua subkategori dari DB
        $subkategoriList = DB::table('subkategori')->pluck('id', 'nama')->toArray();

        // Simpan data utama
        if ($request->has('laporan')) {
            foreach ($request->laporan as $kategoriNama => $data) {
                $kategoriId = $kategoriList[$kategoriNama] ?? null;
                $subkategoriNama = $data['subkategori'] ?? null;
                $subkategoriId = $subkategoriList[$subkategoriNama] ?? null;

                DB::table('laporan_bulanan')->insert([
                    'unit' => $unit,
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                    'kategori_id' => $kategoriId,
                    'subkategori_id' => $subkategoriId,
                    'jumlah' => $data['jumlah'] ?? 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // Simpan data manual (disabilitas & cuti)
        if ($request->has('manual')) {
            foreach ($request->manual as $kategoriKhusus => $data) {
                DB::table('input_manual')->insert([
                    'laporan_id' => null,
                    'nama' => $data['nama'] ?? null,
                    'jenis_disabilitas' => $data['jenis_disabilitas'] ?? null,
                    'rentang_bulan' => $data['rentang_bulan'] ?? null,
                    'status' => $data['status'] ?? null,
                    'kategori_khusus' => $kategoriKhusus,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        return redirect('/content/home')->with('success', 'Data laporan berhasil disimpan!');
    }
}
