<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rekapitulasi Obat Bulanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eaf4ff;
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

        input[type="number"], input[type="text"] {
            width: 80px;
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

    <h1>Rekapitulasi Obat Bulanan</h1>

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
                    <!-- Tanggal 1 - 31 -->
                    <th>1</th><th>2</th><th>3</th><th>4</th><th>5</th><th>6</th><th>7</th><th>8</th><th>9</th><th>10</th>
                    <th>11</th><th>12</th><th>13</th><th>14</th><th>15</th><th>16</th><th>17</th><th>18</th><th>19</th><th>20</th>
                    <th>21</th><th>22</th><th>23</th><th>24</th><th>25</th><th>26</th><th>27</th><th>28</th><th>29</th><th>30</th><th>31</th>
                </tr>
            </thead>
            <tbody>
                <!-- Baris contoh -->
                <tr>
                    <td>1</td>
                    <td>Paracetamol</td>
                    <td><input type="text" class="currency" placeholder="Rp 0"></td>
                    <td><input type="number" placeholder="Sisa Stok"></td>
                    <td><input type="number" placeholder="Stok Masuk"></td>
                    <!-- 31 kolom tanggal -->
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <td><input type="number" value="0"></td>
                    <!-- Otomatis -->

                    <!-- Jumlah Obat Keluar -->
                    <td><input type="number" placeholder="Jumlah Keluar"></td>

                    <!-- Total Biaya -->
                     <td><input type="text" class="currency" placeholder="Rp 0"></td>
                            </tr>
            </tbody>
        </table>
    </div>

    <script>
        // Format input ke rupiah saat user mengetik
        document.querySelectorAll('.currency').forEach(input => {
            input.addEventListener('input', function () {
                let numberString = this.value.replace(/[^,\d]/g, '').toString();
                let split = numberString.split(',');
                let sisa = split[0].length % 3;
                let rupiah = split[0].substr(0, sisa);
                let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    let separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
                this.value = 'Rp ' + rupiah;
            });
        });
    </script>
    
</body>
</html>


