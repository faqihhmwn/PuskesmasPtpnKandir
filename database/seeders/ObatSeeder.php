<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Obat;
use Carbon\Carbon;

class ObatSeeder extends Seeder
{
    public function run()
    {
        $obats = [
            [
                'nama_obat' => 'Paracetamol 500mg',
                'jenis_obat' => 'Analgesik',
                'harga_satuan' => 500,
                'satuan' => 'tablet',
                'stok_awal' => 1000,
                'expired_date' => Carbon::now()->addYear(),
                'keterangan' => 'Obat pereda nyeri dan penurun demam'
            ],
            [
                'nama_obat' => 'Amoxicillin 500mg',
                'jenis_obat' => 'Antibiotik',
                'harga_satuan' => 1200,
                'satuan' => 'kapsul',
                'stok_awal' => 500,
                'expired_date' => Carbon::now()->addMonths(18),
                'keterangan' => 'Antibiotik untuk infeksi bakteri'
            ],
            [
                'nama_obat' => 'CTM 4mg',
                'jenis_obat' => 'Antihistamin',
                'harga_satuan' => 300,
                'satuan' => 'tablet',
                'stok_awal' => 800,
                'expired_date' => Carbon::now()->addMonths(24),
                'keterangan' => 'Obat anti alergi'
            ],
            [
                'nama_obat' => 'OBH Combi',
                'jenis_obat' => 'Ekspektoran',
                'harga_satuan' => 15000,
                'satuan' => 'botol',
                'stok_awal' => 100,
                'expired_date' => Carbon::now()->addMonths(12),
                'keterangan' => 'Obat batuk dan flu'
            ],
            [
                'nama_obat' => 'Vitamin C 500mg',
                'jenis_obat' => 'Vitamin',
                'harga_satuan' => 800,
                'satuan' => 'tablet',
                'stok_awal' => 1500,
                'expired_date' => Carbon::now()->addMonths(30),
                'keterangan' => 'Suplemen vitamin C'
            ],
            [
                'nama_obat' => 'Ibuprofen 400mg',
                'jenis_obat' => 'NSAID',
                'harga_satuan' => 900,
                'satuan' => 'tablet',
                'stok_awal' => 600,
                'expired_date' => Carbon::now()->addMonths(20),
                'keterangan' => 'Anti inflamasi dan pereda nyeri'
            ],
            [
                'nama_obat' => 'Antasida Tablet',
                'jenis_obat' => 'Antasida',
                'harga_satuan' => 400,
                'satuan' => 'tablet',
                'stok_awal' => 400,
                'expired_date' => Carbon::now()->addMonths(15),
                'keterangan' => 'Obat maag dan gangguan pencernaan'
            ],
            [
                'nama_obat' => 'Salbutamol Inhaler',
                'jenis_obat' => 'Bronkodilator',
                'harga_satuan' => 35000,
                'satuan' => 'pcs',
                'stok_awal' => 50,
                'expired_date' => Carbon::now()->addMonths(24),
                'keterangan' => 'Obat asma dan sesak napas'
            ],
            [
                'nama_obat' => 'Betadine Solution',
                'jenis_obat' => 'Antiseptik',
                'harga_satuan' => 25000,
                'satuan' => 'botol',
                'stok_awal' => 200,
                'expired_date' => Carbon::now()->addMonths(36),
                'keterangan' => 'Antiseptik untuk luka'
            ],
            [
                'nama_obat' => 'Captopril 25mg',
                'jenis_obat' => 'ACE Inhibitor',
                'harga_satuan' => 700,
                'satuan' => 'tablet',
                'stok_awal' => 300,
                'expired_date' => Carbon::now()->addMonths(18),
                'keterangan' => 'Obat hipertensi'
            ]
        ];

        foreach ($obats as $obat) {
            $obat['stok_sisa'] = $obat['stok_awal'];
            Obat::create($obat);
        }
    }
}
