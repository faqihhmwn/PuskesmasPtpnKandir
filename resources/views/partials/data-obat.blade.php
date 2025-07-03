<table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%;">
    <thead style="background-color: #0077c0; color: white;">
        <tr>
            <th>No</th>
            <th>Nama Obat</th>
            <th>Harga Satuan</th>
            <th>Sisa Stok Bulan Lalu</th>
            <th>Stok Masuk</th>
            @for ($i = 1; $i <= 31; $i++)
                <th>{{ $i }}</th>
            @endfor
            <th>Total Pemakaian</th>
            <th>Total Biaya</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($obats as $index => $obat)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $obat->nama }}</td>
                <td><input type="number" name="harga_satuan[{{ $obat->id }}]" class="harga-satuan" /></td>
                <td>{{ $obat->sisa_stok_bulan_lalu }}</td>
                <td><input type="number" name="stok_masuk[{{ $obat->id }}]" /></td>
                
                @for ($i = 1; $i <= 31; $i++)
                    <td>
                        <input type="number" name="pemakaian[{{ $obat->id }}][{{ $i }}]" class="pemakaian" />
                    </td>
                @endfor

                <td><input type="number" name="total_pemakaian[{{ $obat->id }}]" class="total-pemakaian" readonly /></td>
                <td><input type="number" name="total_biaya[{{ $obat->id }}]" class="total-biaya" readonly /></td>
            </tr>
        @endforeach
    </tbody>
</table>
