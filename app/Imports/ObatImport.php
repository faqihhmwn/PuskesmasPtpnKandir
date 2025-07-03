<?php

namespace App\Imports;

use App\Models\Obat;
use Maatwebsite\Excel\Concerns\ToModel;

class ObatImport implements ToModel
{
    public function model(array $row)
    {
        return new Obat([
            'nama_obat' => $row[0],
            'satuan'    => $row[1],
            'stok_awal' => $row[2],
            'masuk'     => $row[3],
            'keluar'    => $row[4],
            'sisa'      => $row[5],
        ]);
    }
}

