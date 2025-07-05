<?php

namespace App\Exports;

use App\Models\Obat;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class ObatExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths, WithTitle
{
    protected $startDate;
    protected $endDate;
    protected $includeDailyData;

    public function __construct($startDate, $endDate, $includeDailyData = false)
    {
        $this->startDate = Carbon::parse($startDate);
        $this->endDate = Carbon::parse($endDate);
        $this->includeDailyData = $includeDailyData;
    }

    public function collection()
    {
        $obats = Obat::with(['transaksiObats' => function($query) {
            $query->whereBetween('tanggal', [$this->startDate, $this->endDate]);
        }])->get();

        $data = collect();
        
        foreach ($obats as $index => $obat) {
            $totalMasuk = $obat->transaksiObats->where('tipe_transaksi', 'masuk')->sum('jumlah_masuk');
            $totalKeluar = $obat->transaksiObats->where('tipe_transaksi', 'keluar')->sum('jumlah_keluar');
            $totalBiaya = $totalKeluar * ($obat->harga_satuan ?? 0);
            
            $row = [
                $index + 1,
                $obat->nama_obat ?? '-',
                $obat->jenis_obat ?? '-',
                $obat->harga_satuan ?? 0,
                $obat->stok_awal ?? 0,
                $totalMasuk,
                $totalKeluar,
                $obat->stok_sisa ?? 0,
                $totalBiaya,
                $obat->expired_date ? $obat->expired_date->format('d/m/Y') : '-',
                $obat->keterangan ?? '-'
            ];

            // Tambahkan data harian jika diminta dan periode kurang dari 32 hari
            if ($this->includeDailyData && $this->startDate->diffInDays($this->endDate) <= 31) {
                $currentDate = $this->startDate->copy();
                while ($currentDate <= $this->endDate) {
                    $transaksi = $obat->transaksiObats
                        ->where('tanggal', $currentDate->format('Y-m-d'))
                        ->where('tipe_transaksi', 'keluar')
                        ->first();
                    
                    $row[] = $transaksi ? $transaksi->jumlah_keluar : 0;
                    $currentDate->addDay();
                }
            }

            $data->push($row);
        }

        return $data;
    }

    public function headings(): array
    {
        $headers = [
            'No',
            'Nama Obat',
            'Jenis',
            'Harga Satuan',
            'Stok Awal',
            'Stok Masuk',
            'Total Keluar',
            'Sisa Stok',
            'Total Biaya',
            'Expired Date',
            'Keterangan'
        ];

        // Tambahkan header tanggal jika include daily data
        if ($this->includeDailyData && $this->startDate->diffInDays($this->endDate) <= 31) {
            $currentDate = $this->startDate->copy();
            while ($currentDate <= $this->endDate) {
                $headers[] = $currentDate->format('d/m');
                $currentDate->addDay();
            }
        }

        return $headers;
    }

    public function styles(Worksheet $sheet)
    {
        $lastColumn = $sheet->getHighestColumn();
        $lastRow = $sheet->getHighestRow();

        // Style header
        $sheet->getStyle('A1:' . $lastColumn . '1')->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '0077c0']
            ],
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF']
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN
                ]
            ]
        ]);

        // Style data
        $sheet->getStyle('A2:' . $lastColumn . $lastRow)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN
                ]
            ],
            'alignment' => [
                'vertical' => Alignment::VERTICAL_CENTER
            ]
        ]);

        // Center align untuk kolom angka
        $sheet->getStyle('A2:A' . $lastRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D2:I' . $lastRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

        return [];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 25,
            'C' => 15,
            'D' => 12,
            'E' => 10,
            'F' => 10,
            'G' => 10,
            'H' => 10,
            'I' => 15,
            'J' => 12,
            'K' => 20,
        ];
    }

    public function title(): string
    {
        return 'Laporan Obat ' . $this->startDate->format('d-m-Y') . ' s/d ' . $this->endDate->format('d-m-Y');
    }
}

        // Tambahkan kolom untuk setiap hari dalam periode
        $currentDate = $this->startDate->copy();
        while ($currentDate <= $this->endDate) {
            $headings[] = $currentDate->format('d/m');
            $currentDate->addDay();
        }

        $headings[] = 'Total Keluar';
        $headings[] = 'Sisa Stok';
        $headings[] = 'Total Biaya';

        return $headings;
    }

    public function map($obat): array
    {
        static $counter = 1;
        
        $row = [
            $counter++,
            $obat->nama_obat,
            $obat->jenis_obat ?? '-',
            number_format($obat->harga_satuan, 0, ',', '.'),
            $obat->satuan,
            $obat->stok_awal,
            $obat->stok_masuk
        ];

        $totalKeluar = 0;
        $totalBiaya = 0;

        // Tambahkan data penggunaan untuk setiap hari
        $currentDate = $this->startDate->copy();
        while ($currentDate <= $this->endDate) {
            $transaksi = $obat->transaksiObats
                ->where('tanggal', $currentDate->format('Y-m-d'))
                ->where('tipe_transaksi', 'keluar')
                ->first();
            
            $jumlahKeluar = $transaksi ? $transaksi->jumlah_keluar : 0;
            $row[] = $jumlahKeluar;
            
            $totalKeluar += $jumlahKeluar;
            $totalBiaya += $jumlahKeluar * $obat->harga_satuan;
            
            $currentDate->addDay();
        }

        $row[] = $totalKeluar;
        $row[] = $obat->stok_sisa;
        $row[] = number_format($totalBiaya, 0, ',', '.');

        return $row;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style untuk header
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF']
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'color' => ['rgb' => '0077c0']
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
                ]
            ],
            // Style untuk data
            'A:Z' => [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                    ]
                ]
            ]
        ];
    }
}
