<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Imports\ObatImport;
use Maatwebsite\Excel\Facades\Excel;

class ObatController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new ObatImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data obat berhasil diimpor.');
    }

    public function index()
    {
        $obats = Obat::all();
        return view('partials.data-obat', compact('obats'));
    }
}
