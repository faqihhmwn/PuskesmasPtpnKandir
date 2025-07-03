<div style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
    <h2 style="color: #005f99; text-align: center;">Data Obat</h2>
    <div class="underline-center" style="margin-bottom: 30px;"></div>

    {{-- Form Import Excel --}}
    <form action="{{ route('obat.import') }}" method="POST" enctype="multipart/form-data" style="margin-bottom: 20px;">
        @csrf
        <label for="file" style="font-weight: 600;">Import Data Obat (Excel)</label><br><br>
        <input type="file" name="file" required style="padding: 10px; border: 1px solid #ccc; border-radius: 6px;" />
        <button type="submit" style="background-color: #005f99; color: white; padding: 10px 20px; border: none; border-radius: 6px; margin-left: 10px; cursor: pointer;">
            Upload
        </button>
    </form>

    {{-- Tampilkan pesan sukses --}}
    @if(session('success'))
        <div style="color: green; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabel Data Obat --}}
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr style="background-color: #0077c0; color: white;">
                    <th style="padding: 12px; border: 1px solid #ddd;">#</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Nama Obat</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Jenis</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Stok</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Kadaluarsa</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($obats as $index => $obat)
                    <tr style="background-color: #f9f9f9;">
                        <td style="padding: 10px; border: 1px solid #ddd;">{{ $index + 1 }}</td>
                        <td style="padding: 10px; border: 1px solid #ddd;">{{ $obat->nama }}</td>
                        <td style="padding: 10px; border: 1px solid #ddd;">{{ $obat->jenis }}</td>
                        <td style="padding: 10px; border: 1px solid #ddd;">{{ $obat->stok }}</td>
                        <td style="padding: 10px; border: 1px solid #ddd;">{{ $obat->kadaluarsa }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 20px;">Data obat belum tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
