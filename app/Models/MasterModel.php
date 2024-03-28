<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MasterModel extends Model
{
    // Metode untuk mengambil semua data dari tabel master
    public function allData()
    {
        return DB::table('master')->get();
    }

    // Metode untuk mengambil data berdasarkan ID
    public function getDataById($id_barang)
    {
        return DB::table('master')->where('id_barang', $id_barang)->first();
    }

    // Metode untuk menambahkan data baru
    public function addData($request)
    {
        // Validasi upload file
        $request->validate([
            'foto_barang' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $nama_file = $request->file('foto_barang')->getClientOriginalName();

        DB::table('master')->insert([
            'nama_barang' => $request->nama_barang,
            'harga_barang' => $request->harga_barang,
            'foto_barang' => $nama_file,
            // tambahkan kolom lainnya sesuai kebutuhan
        ]);

        // Pindahkan file gambar ke direktori yang ditentukan
        $request->file('foto_barang')->move(public_path('gambar'), $nama_file);
    }

    // Metode untuk mengupdate data
    public function updateData($request, $id_barang)
    {
        $data = [
            'nama_barang' => $request->nama_barang,
            'harga_barang' => $request->harga_barang,
            // tambahkan kolom lainnya sesuai kebutuhan
        ];

        // Jika ada gambar yang diupload, update juga kolom foto_barang
        if ($request->hasFile('foto_barang')) {
            // Validasi upload file
            $request->validate([
                'foto_barang' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $nama_file = $request->file('foto_barang')->getClientOriginalName();
            $data['foto_barang'] = $nama_file;
            $request->file('foto_barang')->move(public_path('gambar'), $nama_file);
        }

        DB::table('master')->where('id_barang', $id_barang)->update($data);
    }

    // Metode untuk menghapus data
    public function deleteData($id_barang)
    {
        DB::table('master')->where('id_barang', $id_barang)->delete();
    }
}
