@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Monitoring Stok Obat - Mei 2025</h2>

    <form action="{{ route('obat.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button type="submit" class="btn btn-primary">Import Excel</button>
    </form>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Nama Obat</th>
                <th>Satuan</th>
                <th>Stok Awal</th>
                <th>Masuk</th>
                <th>Keluar</th>
                <th>Sisa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($obats as $obat)
            <tr>
                <td>{{ $obat->nama_obat }}</td>
                <td>{{ $obat->satuan }}</td>
                <td>{{ $obat->stok_awal }}</td>
                <td>{{ $obat->masuk }}</td>
                <td>{{ $obat->keluar }}</td>
                <td>{{ $obat->sisa }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
