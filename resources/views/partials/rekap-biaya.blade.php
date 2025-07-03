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
            <!-- Tambahkan token CSRF di sini jika diimplementasikan dalam Laravel -->
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
                    <!-- Isi bulan secara manual dalam HTML -->
                    <script>
                        const bulan = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
                        document.write(
                            bulan.map(b => `
                                <tr>
                                    <td>${b}</td>
                                    <td><input type="number" name="data[${b}][gol_3_4]"></td>
                                    <td><input type="number" name="data[${b}][gol_1_2]"></td>
                                    <td><input type="number" name="data[${b}][kampanye]"></td>
                                    <td><input type="number" name="data[${b}][honor]"></td>
                                    <td><input type="number" name="data[${b}][pens_3_4]"></td>
                                    <td><input type="number" name="data[${b}][pens_1_2]"></td>
                                    <td><input type="number" name="data[${b}][direksi]"></td>
                                    <td><input type="number" name="data[${b}][dekom]"></td>
                                    <td><input type="number" name="data[${b}][pengacara]"></td>
                                    <td><input type="number" name="data[${b}][transport]"></td>
                                    <td><input type="number" name="data[${b}][hiperkes]"></td>
                                    <td><input type="number" name="data[${b}][total]"></td>
                                </tr>
                            `).join('')
                        );
                    </script>
                </tbody>
            </table>

            <button type="submit" class="submit-btn">Simpan Rekap</button>
        </form>
    </div>
</body>
</html>
