@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
    }

    h1, h2 {
        text-align: left;
        margin-bottom: 20px;
    }

    .form {
        margin-bottom: 30px;
        background-color: #f3f3f3;
        padding: 20px;
        border-radius: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table, th, td {
        border: 1px solid #ccc;
    }

    th, td {
        padding: 10px;
        text-align: center;
    }

    th {
        background-color: #0077c0;
        color: white;
    }

    input[type="number"] {
        width: 100%;
        padding: 8px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    .submit-btn {
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #0077c0;
        color: white;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
    }

    .submit-btn:hover {
        background-color: #005fa3;
    }
</style>

<div class="container">
    <h1>Rekapitulasi Biaya Kesehatan</h1>

    <form method="POST" action="{{ route('biaya.store') }}">
        @csrf
        <table>
            <thead>
                <tr>
                    <th>Rekap Per Bulan</th>
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
                    <td><input type="number" name="data[{{ $bulan }}][gol_3_4]" placeholder="Rp" /></td>
                    <td><input type="number" name="data[{{ $bulan }}][gol_1_2]" placeholder="Rp" /></td>
                    <td><input type="number" name="data[{{ $bulan }}][kampanye]" placeholder="Rp" /></td>
                    <td><input type="number" name="data[{{ $bulan }}][honor]" placeholder="Rp" /></td>
                    <td><input type="number" name="data[{{ $bulan }}][pens_3_4]" placeholder="Rp" /></td>
                    <td><input type="number" name="data[{{ $bulan }}][pens_1_2]" placeholder="Rp" /></td>
                    <td><input type="number" name="data[{{ $bulan }}][direksi]" placeholder="Rp" /></td>
                    <td><input type="number" name="data[{{ $bulan }}][dekom]" placeholder="Rp" /></td>
                    <td><input type="number" name="data[{{ $bulan }}][pengacara]" placeholder="Rp" /></td>
                    <td><input type="number" name="data[{{ $bulan }}][transport]" placeholder="Rp" /></td>
                    <td><input type="number" name="data[{{ $bulan }}][hiperkes]" placeholder="Rp" /></td>
                    <td><input type="number" name="data[{{ $bulan }}][total]" placeholder="Rp" /></td>
                </tr>
                @endforeach
            </tbody>
        </table>

