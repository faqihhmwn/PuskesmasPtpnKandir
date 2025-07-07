<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekapBiaya;
use Illuminate\Support\Facades\Response;

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
            ->get()
            ->keyBy('bulan');

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

    //Export CSV
    public function export(Request $request)
{
    $tahun = $request->input('tahun');
    $unit = $request->input('unit');

    $data = RekapBiaya::where('tahun', $tahun)
        ->where('unit', $unit)
        ->orderByRaw("FIELD(bulan, 'Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec')")
        ->get();

    $filename = "rekap-biaya-{$unit}-{$tahun}.csv";

    $headers = [
        "Content-type" => "text/csv",
        "Content-Disposition" => "attachment; filename=$filename",
        "Pragma" => "no-cache",
        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
        "Expires" => "0"
    ];

    $columns = ['Bulan', 'Gol. III-IV', 'Gol. I-II', 'Kampanye', 'Honor', 'Pens. III-IV', 'Pens. I-II', 'Direksi', 'Dekom', 'Pengacara', 'Transport', 'Hiperkes', 'Total'];

    $callback = function () use ($data, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($data as $row) {
            fputcsv($file, [
                $row->bulan, $row->gol_3_4, $row->gol_1_2, $row->kampanye, $row->honor,
                $row->pens_3_4, $row->pens_1_2, $row->direksi, $row->dekom, $row->pengacara,
                $row->transport, $row->hiperkes, $row->total
            ]);
        }

        fclose($file);
    };

    return Response::stream($callback, 200, $headers);
}


    /**
     * Fungsi bantu: konversi format "1.000.000" ke integer
     */
    private function parseRupiah($value)
    {
        return (int)str_replace('.', '', $value);
    }
}
