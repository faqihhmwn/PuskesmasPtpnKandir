<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Rekap Obat Bulanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        thead {
            background-color: #0077c0;
            color: white;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 6px;
            text-align: center;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        input[type="number"] {
            width: 70px;
            padding: 3px;
            font-size: 12px;
        }

        input[readonly] {
            background-color: #eee;
        }
    </style>
</head>
<body>

    <h1>Rekapitulasi Obat Bulanan</h1>
    <div style="overflow-x:auto;">
        <table id="obatTable">
            <thead>
                <tr id="headerRow">
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Harga Satuan</th>
                    <th>Sisa Stok</th>
                    <th>Stok Masuk</th>
                    <!-- Kolom tanggal disisipkan dengan JS -->
                    <th>Jumlah Keluar</th>
                    <th>Total Biaya</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <!-- Baris akan ditambahkan oleh JS -->
            </tbody>
        </table>
    </div>

    <script>
        const namaObat = [
            "Paracetamol", "Amoxicillin", "Ibuprofen", "Vitamin C", "Cetirizine"
            // Tambahkan sisa 195 nama dari file Excel kamu
        ];

        const tanggalHari = (bulan = new Date().getMonth(), tahun = new Date().getFullYear()) => {
            return new Date(tahun, bulan + 1, 0).getDate(); // jumlah hari dalam bulan
        }

        const days = tanggalHari();
        const headerRow = document.getElementById('headerRow');

        for (let i = 1; i <= days; i++) {
            const th = document.createElement('th');
            th.textContent = i;
            headerRow.insertBefore(th, headerRow.children[5]); // sebelum 'Jumlah Keluar'
        }

        const tableBody = document.getElementById('tableBody');

        namaObat.forEach((nama, index) => {
            const tr = document.createElement('tr');

            tr.innerHTML = `
                <td>${index + 1}</td>
                <td>${nama}</td>
                <td><input type="number" class="harga" /></td>
                <td><input type="number" class="sisa" /></td>
                <td><input type="number" class="masuk" /></td>
                ${[...Array(days)].map((_, i) => `<td><input type="number" class="tanggal" data-row="${index}" /></td>`).join('')}
                <td><input type="number" class="keluar" readonly /></td>
                <td><input type="number" class="total" readonly /></td>
            `;

            tableBody.appendChild(tr);
        });

        // Event listener global untuk hitung otomatis
        document.addEventListener('input', function () {
            const rows = document.querySelectorAll('#tableBody tr');

            rows.forEach(row => {
                const harga = +row.querySelector('.harga')?.value || 0;
                const tanggalInputs = row.querySelectorAll('.tanggal');
                let jumlahKeluar = 0;

                tanggalInputs.forEach(input => {
                    jumlahKeluar += +input.value || 0;
                });

                const keluarInput = row.querySelector('.keluar');
                const totalInput = row.querySelector('.total');

                keluarInput.value = jumlahKeluar;
                totalInput.value = harga * jumlahKeluar;
            });
        });
    </script>
</body>
</html>
