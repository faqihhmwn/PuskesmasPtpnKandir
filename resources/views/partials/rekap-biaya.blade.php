@extends(view: 'layouts.app')

@section('content')
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

<div class="container">
    <h2>Form Input Rekapitulasi Biaya Kesehatan per Bulan</h2>
    <form method="POST" action="{{ route('biaya.store') }}">
        @csrf

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
                @foreach (['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'] as $bulan)
                <tr>
                    <td>{{ $bulan }}</td>
                    <td><input type="number" name="data[{{ $bulan }}][gol_3_4]" /></td>
                    <td><input type="number" name="data[{{ $bulan }}][gol_1_2]" /></td>
                    <td><input type="number" name="data[{{ $bulan }}][kampanye]" /></td>
                    <td><input type="number" name="data[{{ $bulan }}][honor]" /></td>
                    <td><input type="number" name="data[{{ $bulan }}][pens_3_4]" /></td>
                    <td><input type="number" name="data[{{ $bulan }}][pens_1_2]" /></td>
                    <td><input type="number" name="data[{{ $bulan }}][direksi]" /></td>
                    <td><input type="number" name="data[{{ $bulan }}][dekom]" /></td>
                    <td><input type="number" name="data[{{ $bulan }}][pengacara]" /></td>
                    <td><input type="number" name="data[{{ $bulan }}][transport]" /></td>
                    <td><input type="number" name="data[{{ $bulan }}][hiperkes]" /></td>
                    <td><input type="number" name="data[{{ $bulan }}][total]" /></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="submit-btn">Simpan Rekap</button>
    </form>
</div>
@endsection
