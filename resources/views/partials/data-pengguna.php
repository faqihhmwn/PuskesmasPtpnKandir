<style>
    body {
        font-family: Arial, sans-serif;
        /* margin: 40px; */
    }

    h1 {
        text-align: left;
        margin-bottom: 30px;
    }

    .form-container {
        display: flex;
        gap: 40px;
        flex-wrap: wrap;
        justify-content: center;
    }

    .column {
        flex: 1;
        min-width: 300px;
    }

    .form-row {
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
    }

    .form-row label {
        margin-bottom: 6px;
        font-weight: bold;
    }

    .form-row input,
    .form-row select {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .radio-group {
        display: flex;
        gap: 15px;
    }

    .radio-group label {
        font-weight: normal;
    }

    .form {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: flex-end;
        background-color: #f3f3f3;
        padding: 20px;
        border-radius: 10px;
        gap: 20px;
    }

    .form label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form input[type="text"] {
        padding: 10px;
        width: 250px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .form button {
        padding: 10px 20px;
        margin-right: 10px;
        background-color: #0077c0;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    .form button:hover {
        background-color: #0077c0;
    }

    @media (max-width: 600px) {
        .form {
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }

        .form input[type="text"] {
            width: 100%;
            margin-bottom: 10px;
        }

        .form button {
            width: auto;
            margin-bottom: 10px;
        }
    }
</style>

<body>
    <h1>Data Pengguna</h1>
    <div class="form-container">
        <div class="column">
            <div class="form-row">
                <label for="idPengguna">ID Pengguna</label>
                <input type="text" id="idPengguna" placeholder="Input ID Pengguna">
            </div>
            <div class="form-row">
                <label for="jabatan">Pilih Jabatan:</label>
                <select id="jabatan" name="jabatan">
                    <option disabled selected value="">-- Pilih Jabatan --</option>
                    <option value="dokter">Dokter</option>
                    <option value="perawat">Perawat</option>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                </select>
            </div>
            <div class="form-row">
                <label for="pegawai">Nama Pegawai</label>
                <input type="text" id="pegawai" placeholder="Input Nama Pegawai">
            </div>
            <div class="form-row">
                <label for="tglLahir">Tanggal Lahir</label>
                <input type="date" id="tglLahir">
            </div>
            <div class="form-row">
                <label for="umur">Umur</label>
                <input type="text" id="umur">
            </div>
            <div class="form-row">
                <label>Jenis Kelamin:</label>
                <div class="radio-group">
                    <label><input type="radio" name="gender" value="Laki-laki"> Laki-laki</label>
                    <label><input type="radio" name="gender" value="Perempuan"> Perempuan</label>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="form-row">
                <label for="agama">Agama</label>
                <input type="text" id="agama">
            </div>
            <div class="form-row">
                <label for="pendidikan">Pendidikan</label>
                <input type="text" id="pendidikan">
            </div>
            <div class="form-row">
                <label for="noHp">NoHP</label>
                <input type="text" id="noHp">
            </div>
            <div class="form-row">
                <label for="email">Email</label>
                <input type="text" id="email">
            </div>
            <div class="form-row">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat">
            </div>
            <div class="form-row">
                <label for="jadwal">Pilih Jadwal:</label>
                <select id="jadwal" name="jadwal">
                    <option disabled selected value="">-- Pilih Jadwal --</option>
                    <option value="senin">Senin</option>
                    <option value="selasa">Selasa</option>
                    <option value="rabu">Rabu</option>
                    <option value="kamis">Kamis</option>
                    <option value="jumat">Jumat</option>
                    <option value="sabtu">Sabtu</option>
                    <option value="minggu">Minggu</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form">
        <div>
            <label for="cariIdPengguna">Cari ID Pengguna</label>
            <input type="text" id="cariIdPengguna" placeholder="Masukkan ID Pengguna">
        </div>
        <div>
            <button type="button" id="btnDelete" style="background-color: #f44336;">Hapus</button>
            <button type="button" id="btnUpdate" style="background-color: blue;">Update</button>
            <button type="button" id="btnAdd">Tambah</button>
        </div>
    </div>

    <h2>Daftar Pengguna</h2>
    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead style="background-color: #0077c0 ; color: white;">
            <tr>
                <th>No</th>
                <th>ID Pengguna</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Jenis Kelamin</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>USR001</td>
                <td>Faqih Himawan</td>
                <td>Admin</td>
                <td>Laki-laki</td>
            </tr>
            <tr>
                <td>2</td>
                <td>USR002</td>
                <td>Sari Wijaya</td>
                <td>Perawat</td>
                <td>Perempuan</td>
            </tr>
            <!-- Tambahkan baris lainnya sesuai kebutuhan -->
        </tbody>
    </table>
</body>