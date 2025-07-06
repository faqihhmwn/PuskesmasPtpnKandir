<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekapBiaya;

class RekapBiayaController extends Controller
{
    /**
     * Tampilkan form rekap biaya
     */
    public function index(Request $request)
    {
        $tahun = $request->input('tahun');
        $unit = $request->input('unit');

        $data = RekapBiaya::where('tahun', $tahun)
            ->where('unit', $unit)
            ->orderByRaw("FIELD(bulan, 'Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec')")
            ->get();

        return view('partials.rekap-biaya', compact('data', 'tahun', 'unit'));
    }

    /**
     * Simpan data rekap biaya baru
     */
    public function store(Request $request)
    {
        // ✅ VALIDASI TAHUN DAN UNIT
        $request->validate([
            'tahun' => 'required|digits:4|integer|min:2000|max:' . date('Y'),
            'unit' => 'required|in:Kedaton,Sukarame,Way Halim',
        ]);
        $data = $request->input('data');

        foreach ($data as $row) {
            RekapBiaya::updateOrCreate(
                [
                    'bulan' => $row['bulan'],
                    'tahun' => $request->input('tahun'),
                    'unit' => $request->input('unit')
                ],
                [
                    'gol_3_4'   => $this->parseRupiah($row['gol_3_4'] ?? 0),
                    'gol_1_2'   => $this->parseRupiah($row['gol_1_2'] ?? 0),
                    'kampanye'  => $this->parseRupiah($row['kampanye'] ?? 0),
                    'honor'     => $this->parseRupiah($row['honor'] ?? 0),
                    'pens_3_4'  => $this->parseRupiah($row['pens_3_4'] ?? 0),
                    'pens_1_2'  => $this->parseRupiah($row['pens_1_2'] ?? 0),
                    'direksi'   => $this->parseRupiah($row['direksi'] ?? 0),
                    'dekom'     => $this->parseRupiah($row['dekom'] ?? 0),
                    'pengacara' => $this->parseRupiah($row['pengacara'] ?? 0),
                    'transport' => $this->parseRupiah($row['transport'] ?? 0),
                    'hiperkes'  => $this->parseRupiah($row['hiperkes'] ?? 0),
                    'total'     => $this->parseRupiah($row['total'] ?? 0)
                ]
            );
        }

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Update satu baris rekap biaya
     */
    public function update(Request $request, $id)
    {
        $rekap = RekapBiaya::findOrFail($id);
        $rekap->update($request->all());

        return response()->json(['message' => 'Data berhasil diperbarui']);
    }

    /**
     * Hapus data
     */
    public function destroy($id)
    {
        $rekap = RekapBiaya::findOrFail($id);
        $rekap->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }

    /**
     * Fungsi bantu: konversi format "1.000.000" ke integer
     */
    private function parseRupiah($value)
    {
        return (int)str_replace('.', '', $value);
    }
}
