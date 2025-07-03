<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Obat</title>
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
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #0077c0;
            color: white;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .actions {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-edit {
            background-color: #0077c0;
        }

        .btn-delete {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <h1>Data Obat</h1>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Obat</th>
                    <th>Nama Obat</th>
                    <th>Jenis</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Contoh statis, ganti dengan data dinamis dari Laravel -->
                <tr>
                    <td>1</td>
                    <td>OBT001</td>
                    <td>Paracetamol</td>
                    <td>Tablet</td>
                    <td>100</td>
                    <td>Strip</td>
                    <td>5.000</td>
                    <td class="actions">
                        <button class="btn btn-edit">Edit</button>
                        <button class="btn btn-delete">Hapus</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>OBT002</td>
                    <td>Amoxicillin</td>
                    <td>Kapsul</td>
                    <td>75</td>
                    <td>Strip</td>
                    <td>7.000</td>
                    <td class="actions">
                        <button class="btn btn-edit">Edit</button>
                        <button class="btn btn-delete">Hapus</button>
                    </td>
                </tr>
                <!-- Tambah data lainnya di sini -->
            </tbody>
        </table>
    </div>
</body>
</html>
