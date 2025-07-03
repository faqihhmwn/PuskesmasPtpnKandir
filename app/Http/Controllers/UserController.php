<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_pengguna' => 'required|unique:penggunas',
            'nama' => 'required',
            'jabatan' => 'required',
            'tgl_lahir' => 'required',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'jadwal' => 'required',
        ]);

        Pengguna::create($data);
        return response()->json(['message' => 'Data berhasil ditambahkan']);
    }

    public function update(Request $request, $id)
    {
        $pengguna = Pengguna::where('id_pengguna', $id)->firstOrFail();
        $pengguna->update($request->all());

        return response()->json(['message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $pengguna = Pengguna::where('id_pengguna', $id)->first();
        if ($pengguna) {
            $pengguna->delete();
            return response()->json(['message' => 'Data berhasil dihapus']);
        }

        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }
}

