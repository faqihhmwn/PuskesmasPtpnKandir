{{-- resources/views/partials/rekap-biaya.blade.php --}}

<div class="content">
    <h2 style="color:#003f66; font-weight:600;">Rekapitulasi Biaya Kesehatan</h2>

    {{-- Filter Tahun dan Unit Kantor --}}
    <form method="GET" action="{{ route('rekap-biaya.index') }}" class="row g-3 my-3">
        <div class="col-md-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="text" name="tahun" id="tahun" class="form-control" placeholder="YYYY" value="{{ request('tahun') }}">
        </div>
        <div class="col-md-3">
            <label for="unit" class="form-label">Unit Kantor</label>
            <select name="unit" id="unit" class="form-select">
                <option value="">-- Pilih Unit --</option>
                <option value="Kedaton" {{ request('unit') == 'Kedaton' ? 'selected' : '' }}>Kedaton</option>
                <option value="Sukarame" {{ request('unit') == 'Sukarame' ? 'selected' : '' }}>Sukarame</option>
                <option value="Way Halim" {{ request('unit') == 'Way Halim' ? 'selected' : '' }}>Way Halim</option>
            </select>
        </div>
        <div class="col-md-2 align-self-end">
            <button type="submit" class="btn btn-primary w-100" style="background-color:#005f99; border:none;">Tampilkan</button>
        </div>
        <div class="col-md-2 align-self-end">
            <a href="{{ route('rekap-biaya.export', request()->all()) }}" class="btn btn-success w-100" style="background-color:#0077c0; border:none;">Export CSV</a>
        </div>
    </form>

    {{-- Tabel Input Biaya --}}
    <div class="table-responsive">
        <form action="{{ route('rekap-biaya.store') }}" method="POST">
            @csrf
            {{-- Tambahkan hidden input tahun dan unit di sini --}}
            <input type="hidden" name="tahun" value="{{ $tahun }}">
            <input type="hidden" name="unit" value="{{ $unit }}">
            <table class="table table-bordered text-center align-middle" style="background-color:white;">
                <thead style="background-color:#003f66; color:white;">
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
                        <th>Total Biaya</th>
                    </tr>
                </thead>
                <tbody>
                    @php $bulanList = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec']; @endphp
                    @foreach($bulanList as $index => $bulan)
                    <tr>
                        <td>
                            <input type="hidden" name="data[{{ $index }}][bulan]" value="{{ $bulan }}">
                            <input type="text" class="form-control" value="{{ $bulan }}" readonly>
                        </td>
                        @foreach(['gol_3_4', 'gol_1_2', 'kampanye', 'honor', 'pens_3_4', 'pens_1_2', 'direksi', 'dekom', 'pengacara', 'transport', 'hiperkes'] as $field)
                            <td>
                                <input type="text" name="data[{{ $index }}][{{ $field }}]" class="form-control rupiah-input" oninput="hitungTotal(this)">
                            </td>
                        @endforeach
                        <td>
                            <input type="text" name="data[{{ $index }}][total]" class="form-control total" readonly>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-end mt-3">
                <button type="submit" class="btn" style="background-color:#004f80; color:white;">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
function formatRupiah(angka) {
    let number_string = angka.replace(/[^\d]/g, '').toString();
    let sisa = number_string.length % 3;
    let rupiah = number_string.substr(0, sisa);
    let ribuan = number_string.substr(sisa).match(/\d{3}/g);

    if (ribuan) {
        rupiah += (sisa ? '.' : '') + ribuan.join('.');
    }
    return rupiah;
}

document.querySelectorAll('.rupiah-input').forEach(input => {
    input.addEventListener('input', function () {
        this.value = formatRupiah(this.value);
    });
});

function hitungTotal(el) {
    const row = el.closest('tr');
    let total = 0;
    row.querySelectorAll('.rupiah-input').forEach(input => {
        let val = parseInt(input.value.replace(/[^\d]/g, '')) || 0;
        total += val;
    });
    row.querySelector('.total').value = formatRupiah(total.toString());
}
</script>
