<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rekapitulasi Obat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: left;
            margin-bottom: 30px;
        }

        .table-container {
            background-color: #f3f3f3;
            padding: 20px;
            border-radius: 10px;
            overflow-x: auto;
        }

        table {
            width: max-content;
            min-width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #0077c0;
            color: white;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 5px;
            text-align: center;
            white-space: nowrap;
        }

        input[type="number"] {
            width: 60px;
        }

        input[type="text"] {
            width: 100px;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tfoot {
            background-color: #e0e0e0;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h1>Rekapitulasi Penggunaan Obat - Mei 2025</h1>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Nama Obat</th>
                    <th rowspan="2">Harga Satuan</th>
                    <th rowspan="2">Sisa Stok Bulan Lalu</th>
                    <th rowspan="2">Stok Masuk</th>
                    <th colspan="31">Tanggal</th>
                    <th rowspan="2">Jumlah Obat Keluar</th>
                    <th rowspan="2">Total Biaya</th>
                </tr>
                <tr>
                    <!-- Tanggal 1 sampai 31 -->
                    <!-- Gunakan JavaScript jika ingin buat otomatis -->
                    ${Array.from({length: 31}, (_, i) => `<th>${i + 1}</th>`).join('')}
                </tr>
            </thead>
            <tbody>
                <!-- Contoh satu baris -->
                <tr>
                    <td>1</td>
                    <td>Paracetamol</td>
                    <td><input type="number" placeholder="Harga"></td>
                    <td><input type="number" placeholder="Stok Lalu"></td>
                    <td><input type="number" placeholder="Stok Masuk"></td>
                    ${Array.from({length: 31}, () => `<td><input type="number" min="0" value="0"></td>`).join('')}
                    <td><input type="number" readonly></td>
                    <td><input type="number" readonly></td>
                </tr>
                <!-- Tambah baris lain sesuai jumlah obat -->
            </tbody>
        </table>
    </div>

</body>
</html>
