<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rekapitulasi Biaya Kesehatan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        table, th, td {
            border: 1px solid #999;
        }

        th, td {
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #0077c0;
            color: white;
        }

        input[type="number"] {
            width: 100%;
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .submit-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #0077c0;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .submit-btn:hover {
            background-color: #005f99;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Rekapitulasi Biaya Kesehatan</h2>
        <form method="POST" action="/rekap-biaya/simpan">
            <table>
                <thead>
                    <tr>
                        <th>Rekap Bulan</th>
                        <th>Gol. III-IV</th>
                        <th>Gol. I-II</th>
                        <th>Kampanye</th>
                        <th>Honor + ILA + OS</th>
                        <th>Pens. III-IV</th>
                        <th>Pens. I-II</th>
                        <th>Direksi</th>
                        <th>Dekom</th>
                        <th>Pengacara</th>
                        <th>Transport</th>
                        <th>Hiperkes</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Daftar bulan -->
                    <!-- Loop manual: Jan - Dec -->
                    <!-- Kolom pertama (bulan) dikunci -->
                    <!-- Sisanya input manual -->
                    <!-- JANUARI -->
                    <tr>
                        <td><input type="text" value="Jan" name="data[Jan][bulan]" readonly></td>
                        <td><input type="number" name="data[Jan][gol_3_4]"></td>
                        <td><input type="number" name="data[Jan][gol_1_2]"></td>
                        <td><input type="number" name="data[Jan][kampanye]"></td>
                        <td><input type="number" name="data[Jan][honor]"></td>
                        <td><input type="number" name="data[Jan][pens_3_4]"></td>
                        <td><input type="number" name="data[Jan][pens_1_2]"></td>
                        <td><input type="number" name="data[Jan][direksi]"></td>
                        <td><input type="number" name="data[Jan][dekom]"></td>
                        <td><input type="number" name="data[Jan][pengacara]"></td>
                        <td><input type="number" name="data[Jan][transport]"></td>
                        <td><input type="number" name="data[Jan][hiperkes]"></td>
                        <td><input type="number" name="data[Jan][total]"></td>
                    </tr>

                    <!-- Copy untuk Feb - Dec -->
                    <!-- FEB -->
                    <tr>
                        <td><input type="text" value="Feb" name="data[Feb][bulan]" readonly></td>
                        <td><input type="number" name="data[Feb][gol_3_4]"></td>
                        <td><input type="number" name="data[Feb][gol_1_2]"></td>
                        <td><input type="number" name="data[Feb][kampanye]"></td>
                        <td><input type="number" name="data[Feb][honor]"></td>
                        <td><input type="number" name="data[Feb][pens_3_4]"></td>
                        <td><input type="number" name="data[Feb][pens_1_2]"></td>
                        <td><input type="number" name="data[Feb][direksi]"></td>
                        <td><input type="number" name="data[Feb][dekom]"></td>
                        <td><input type="number" name="data[Feb][pengacara]"></td>
                        <td><input type="number" name="data[Feb][transport]"></td>
                        <td><input type="number" name="data[Feb][hiperkes]"></td>
                        <td><input type="number" name="data[Feb][total]"></td>
                    </tr>

                    <!-- Lanjutkan sampai Dec -->
                    <!-- Ganti value dan name bulan: Mar, Apr, ..., Dec -->
                    <!-- Jika ingin saya lanjutkan semua 12 bulan, tinggal beri tahu -->
                </tbody>
            </table>

            <button type="submit" class="submit-btn">Simpan Rekap</button>
        </form>
    </div>
</body>
</html>
