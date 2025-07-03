
<!DOCTYPE html>
<html>
<head>
    <title>Input Laporan Kesehatan Lengkap</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
        }
        h2 {
            margin-bottom: 20px;
        }
        h3 {
            margin-top: 30px;
            margin-bottom: 10px;
            color: #0077c0;
        }
        .form-row {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
            max-width: 500px;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        select, input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            background-color: #0077c0;
            color: white;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h2>Form Input Laporan Kesehatan Bulanan</h2>

<form method="POST" action="/laporan/store">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <h3>KEPENDUDUKAN</h3>
<div class='form-row'>
<label>Subkategori:</label>
<select name='laporan[KEPENDUDUKAN][subkategori]'>
<option value='PEKERJA'>PEKERJA</option>
<option value='BATIH'>BATIH</option>
<option value='PENSIUNAN'>PENSIUNAN</option>
<option value='ISTRI'>ISTRI</option>
<option value='HONORER'>HONORER</option>
<option value='OS'>OS</option>
<option value='ILA'>ILA</option>
<option value='LAIN-LAIN'>LAIN-LAIN</option>
</select>
<label>Jumlah:</label>
<input type='number' name='laporan[KEPENDUDUKAN][jumlah]' placeholder='Masukkan jumlah'>
</div>
<h3>PENYAKIT</h3>
<div class='form-row'>
<label>Subkategori:</label>
<select name='laporan[PENYAKIT][subkategori]'>
<option value='Peny. Saluran Pernafasan'>Peny. Saluran Pernafasan</option>
<option value='Peny. Saluran Pencernaan'>Peny. Saluran Pencernaan</option>
<option value='Peny. Jantung dan Pembuluh Darah'>Peny. Jantung dan Pembuluh Darah</option>
<option value='Peny. Saluran Kemih dan Kelamin'>Peny. Saluran Kemih dan Kelamin</option>
<option value='Peny. Kulit'>Peny. Kulit</option>
<option value='Peny. Syaraf dan Jiwa'>Peny. Syaraf dan Jiwa</option>
<option value='Peny. Mata'>Peny. Mata</option>
<option value='Peny. Telinga dan Mastoid'>Peny. Telinga dan Mastoid</option>
<option value='Peny. Otot dan Tulang'>Peny. Otot dan Tulang</option>
<option value='Peny. Darah dan Gizi'>Peny. Darah dan Gizi</option>
<option value='Peny. Mulut dan Gigi'>Peny. Mulut dan Gigi</option>
<option value='Peny. Kandungan'>Peny. Kandungan</option>
<option value='Peny. Degeneratif'>Peny. Degeneratif</option>
<option value='Peny. Epidemi'>Peny. Epidemi</option>
<option value='Peny. Fisis dan Kimia'>Peny. Fisis dan Kimia</option>
<option value='Peny. Lain-lain'>Peny. Lain-lain</option>
</select>
<label>Jumlah:</label>
<input type='number' name='laporan[PENYAKIT][jumlah]' placeholder='Masukkan jumlah'>
</div>
<h3>OPNAME</h3>
<div class='form-row'>
<label>Subkategori:</label>
<select name='laporan[OPNAME][subkategori]'>
<option value='Pekerja'>Pekerja</option>
<option value='Batih Pekerja'>Batih Pekerja</option>
<option value='Pensiunan'>Pensiunan</option>
<option value='Batih Pensiunan'>Batih Pensiunan</option>
</select>
<label>Jumlah:</label>
<input type='number' name='laporan[OPNAME][jumlah]' placeholder='Masukkan jumlah'>
</div>
<h3>PENYAKIT KRONIS</h3>
<div class='form-row'>
<label>Subkategori:</label>
<select name='laporan[PENYAKIT KRONIS][subkategori]'>
<option value='TBC'>TBC</option>
<option value='DM'>DM</option>
<option value='HIPERTENSI'>HIPERTENSI</option>
<option value='ASMA BRONCHIALE'>ASMA BRONCHIALE</option>
<option value='CRF'>CRF</option>
<option value='KANKER/KARSINOMA'>KANKER/KARSINOMA</option>
<option value='CEROSIS HEPATIS'>CEROSIS HEPATIS</option>
<option value='DEPRESI'>DEPRESI</option>
<option value='STROKE'>STROKE</option>
<option value='DC'>DC</option>
</select>
<label>Jumlah:</label>
<input type='number' name='laporan[PENYAKIT KRONIS][jumlah]' placeholder='Masukkan jumlah'>
</div>
<h3>KONSULTASI KLINIK</h3>
<div class='form-row'>
<label>Subkategori:</label>
<select name='laporan[KONSULTASI KLINIK][subkategori]'>
<option value='Kasus Baru'>Kasus Baru</option>
<option value='Kasus Lama'>Kasus Lama</option>
</select>
<label>Jumlah:</label>
<input type='number' name='laporan[KONSULTASI KLINIK][jumlah]' placeholder='Masukkan jumlah'>
</div>
<h3>CUTI SAKIT</h3>
<div class='form-row'>
<label>Subkategori:</label>
<select name='laporan[CUTI SAKIT][subkategori]'>
<option value='Cuti Sakit'>Cuti Sakit</option>
<option value='Hari Sakit'>Hari Sakit</option>
</select>
<label>Jumlah:</label>
<input type='number' name='laporan[CUTI SAKIT][jumlah]' placeholder='Masukkan jumlah'>
</div>
<h3>PESERTA KB</h3>
<div class='form-row'>
<label>Subkategori:</label>
<select name='laporan[PESERTA KB][subkategori]'>
<option value='PIL'>PIL</option>
<option value='IUD'>IUD</option>
<option value='INJEKSI'>INJEKSI</option>
<option value='IMPLANT'>IMPLANT</option>
<option value='MOW'>MOW</option>
<option value='MOP'>MOP</option>
<option value='KONDOM'>KONDOM</option>
</select>
<label>Jumlah:</label>
<input type='number' name='laporan[PESERTA KB][jumlah]' placeholder='Masukkan jumlah'>
</div>
<h3>METODE KB</h3>
<div class='form-row'>
<label>Subkategori:</label>
<select name='laporan[METODE KB][subkategori]'>
<option value='PUS'>PUS</option>
<option value='AKSEPTOR'>AKSEPTOR</option>
<option value='SISA PUS'>SISA PUS</option>
<option value='PUS (%)'>PUS (%)</option>
<option value='MANTAP'>MANTAP</option>
<option value='TAK MANTAP'>TAK MANTAP</option>
</select>
<label>Jumlah:</label>
<input type='number' name='laporan[METODE KB][jumlah]' placeholder='Masukkan jumlah'>
</div>
<h3>KEHAMILAN</h3>
<div class='form-row'>
<label>Subkategori:</label>
<select name='laporan[KEHAMILAN][subkategori]'>
<option value='Lama (Bulan lalu)'>Lama (Bulan lalu)</option>
<option value='Baru (Bulan ini)'>Baru (Bulan ini)</option>
<option value='Partus'>Partus</option>
</select>
<label>Jumlah:</label>
<input type='number' name='laporan[KEHAMILAN][jumlah]' placeholder='Masukkan jumlah'>
</div>
<h3>IMUNISASI</h3>
<div class='form-row'>
<label>Subkategori:</label>
<select name='laporan[IMUNISASI][subkategori]'>
<option value='BCG'>BCG</option>
<option value='POLIO 1'>POLIO 1</option>
<option value='PENTABIO 1, POLIO 2'>PENTABIO 1, POLIO 2</option>
<option value='PENTABIO 2, POLIO 3'>PENTABIO 2, POLIO 3</option>
<option value='PENTABIO 3, POLIO 4'>PENTABIO 3, POLIO 4</option>
<option value='CAMPAK'>CAMPAK</option>
<option value='BOOSTER PENTA'>BOOSTER PENTA</option>
<option value='BOOSTER CAMPAK'>BOOSTER CAMPAK</option>
<option value='VAKSIN MR/VIT A/POLIO'>VAKSIN MR/VIT A/POLIO</option>
</select>
<label>Jumlah:</label>
<input type='number' name='laporan[IMUNISASI][jumlah]' placeholder='Masukkan jumlah'>
</div>
<h3>KEMATIAN</h3>
<div class='form-row'>
<label>Subkategori:</label>
<select name='laporan[KEMATIAN][subkategori]'>
<option value='PEKERJA'>PEKERJA</option>
<option value='BATIH'>BATIH</option>
<option value='PENSIUNAN'>PENSIUNAN</option>
<option value='BATIH PENSIUNAN'>BATIH PENSIUNAN</option>
</select>
<label>Jumlah:</label>
<input type='number' name='laporan[KEMATIAN][jumlah]' placeholder='Masukkan jumlah'>
</div>
<h3>KLAIM ASURANSI</h3>
<div class='form-row'>
<label>Subkategori:</label>
<select name='laporan[KLAIM ASURANSI][subkategori]'>
<option value='Dalam proses'>Dalam proses</option>
<option value='Sudah Selesai'>Sudah Selesai</option>
</select>
<label>Jumlah:</label>
<input type='number' name='laporan[KLAIM ASURANSI][jumlah]' placeholder='Masukkan jumlah'>
</div>
<h3>KECELAKAAN KERJA</h3>
<div class='form-row'>
<label>Subkategori:</label>
<select name='laporan[KECELAKAAN KERJA][subkategori]'>
<option value='Fatal/Meninggal'>Fatal/Meninggal</option>
<option value='Berat/Cacat Total'>Berat/Cacat Total</option>
<option value='Sedang/cacat sebagian'>Sedang/cacat sebagian</option>
<option value='Ringan'>Ringan</option>
</select>
<label>Jumlah:</label>
<input type='number' name='laporan[KECELAKAAN KERJA][jumlah]' placeholder='Masukkan jumlah'>
</div>
<h3>SAKIT BERKEPANJANGAN</h3>
<div class='form-row'>
<label>Subkategori:</label>
<select name='laporan[SAKIT BERKEPANJANGAN][subkategori]'>
<option value='KASUS BARU'>KASUS BARU</option>
<option value='KASUS LAMA'>KASUS LAMA</option>
</select>
<label>Jumlah:</label>
<input type='number' name='laporan[SAKIT BERKEPANJANGAN][jumlah]' placeholder='Masukkan jumlah'>
</div>
<h3>ABSENSI DOKTER HONORER</h3>
<div class='form-row'>
<label>Subkategori:</label>
<select name='laporan[ABSENSI DOKTER HONORER][subkategori]'>
<option value='HADIR'>HADIR</option>
<option value='TIDAK HADIR'>TIDAK HADIR</option>
</select>
<label>Jumlah:</label>
<input type='number' name='laporan[ABSENSI DOKTER HONORER][jumlah]' placeholder='Masukkan jumlah'>
</div>
<h3>PEKERJA DISABILITAS</h3>
<div class='form-row'>
<label>Nama:</label>
<input type='text' name='manual[PEKERJA DISABILITAS][nama]' placeholder='Masukkan nama'>
<label>Jenis Disabilitas:</label>
<input type='text' name='manual[PEKERJA DISABILITAS][jenis_disabilitas]' placeholder='Jenis disabilitas'>
</div>
<h3>CUTI HAMIL</h3>
<div class='form-row'>
<label>Nama:</label>
<input type='text' name='manual[CUTI HAMIL][nama]' placeholder='Masukkan nama'>
<label>Rentang Bulan:</label>
<input type='text' name='manual[CUTI HAMIL][rentang_bulan]' placeholder='Contoh: Januari s.d Maret'>
<label>Status:</label>
<input type='text' name='manual[CUTI HAMIL][status]' placeholder='Status'>
</div>
<h3>CUTI MELAHIRKAN</h3>
<div class='form-row'>
<label>Nama:</label>
<input type='text' name='manual[CUTI MELAHIRKAN][nama]' placeholder='Masukkan nama'>
<label>Rentang Bulan:</label>
<input type='text' name='manual[CUTI MELAHIRKAN][rentang_bulan]' placeholder='Contoh: Januari s.d Maret'>
<label>Status:</label>
<input type='text' name='manual[CUTI MELAHIRKAN][status]' placeholder='Status'>
</div>
<h3>CUTI KARYAWAN KARENA ISTRI MELAHIRKAN</h3>
<div class='form-row'>
<label>Nama:</label>
<input type='text' name='manual[CUTI KARYAWAN KARENA ISTRI MELAHIRKAN][nama]' placeholder='Masukkan nama'>
<label>Rentang Bulan:</label>
<input type='text' name='manual[CUTI KARYAWAN KARENA ISTRI MELAHIRKAN][rentang_bulan]' placeholder='Contoh: Januari s.d Maret'>
<label>Status:</label>
<input type='text' name='manual[CUTI KARYAWAN KARENA ISTRI MELAHIRKAN][status]' placeholder='Status'>
</div>


    <br>
    <button type="submit">Simpan Seluruh Data</button>
</form>

</body>
</html>
