<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tabel Obat Lengkap</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow-x: auto;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 6px;
            text-align: center;
            font-size: 12px;
        }

        thead {
            background-color: #0077c0;
            color: white;
            position: sticky;
            top: 0;
        }

        input[type="number"] {
            width: 70px;
        }

        .container {
            overflow-x: scroll;
        }

        .readonly {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <h1>Rekapitulasi Obat</h1>
    <div class="container">
        <table id="tabelObat">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Harga Satuan</th>
                    <th>Sisa Stok</th>
                    <th>Stok Masuk</th>
                    <!-- Kolom tanggal 1-31 -->
                    <!-- Disisipkan via JS -->
                    <th>Jumlah Keluar</th>
                    <th>Total Biaya</th>
                </tr>
            </thead>
            <tbody id="obatBody">
                <!-- Data obat akan disisipkan via JS -->
            </tbody>
        </table>
    </div>

    <script>
        const namaObat = [
            "Paracetamol", "Amoxicillin", "Ibuprofen", "Cetirizine", "Omeprazole"
            // Tambahkan sampai 200 atau ambil dari backend
        ];

        const tbody = document.getElementById('obatBody');
        const theadRow = document.querySelector('thead tr');

        // Sisipkan kolom tanggal 1-31
        for (let i = 1; i <= 31; i++) {
            const th = document.createElement('th');
            th.textContent = i;
            theadRow.insertBefore(th, theadRow.children[5]); // Sebelum "Jumlah Keluar"
        }

        // Buat baris untuk setiap obat
        namaObat.forEach((nama, index) => {
            const tr = document.createElement('tr');

            // Kolom: No, Nama Obat, Harga, Sisa, Masuk
            tr.innerHTML = `
                <td>${index + 1}</td>
                <td>${nama}</td>
                <td><input type="number" class="harga" /></td>
                <td><input type="number" class="sisa" /></td>
                <td><input type="number" class="masuk" /></td>
            `;

            // Kolom tanggal 1-31
            for (let t = 1; t <= 31; t++) {
                tr.innerHTML += `<td><input type="number" class="harian" value="0" /></td>`;
            }

            // Kolom Jumlah Keluar dan Total Biaya
            tr.innerHTML += `
                <td><input type="number" class="keluar readonly" readonly /></td>
                <td><input type="number" class="total readonly" readonly /></td>
            `;

            tbody.appendChild(tr);
        });

        // Kalkulasi otomatis
        document.addEventListener('input', () => {
            const rows = document.querySelectorAll('#obatBody tr');
            rows.forEach(row => {
                const harga = parseFloat(row.querySelector('.harga')?.value) || 0;
                const harian = row.querySelectorAll('.harian');
                let totalKeluar = 0;

                harian.forEach(input => {
                    totalKeluar += parseFloat(input.value) || 0;
                });

                row.querySelector('.keluar').value = totalKeluar;
                row.querySelector('.total').value = totalKeluar * harga;
            });
        });
    </script>
</body>
</html>
