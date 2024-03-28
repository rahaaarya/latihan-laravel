<?php
namespace App\Http\Controllers;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = new UserModel();
        $data = $user->allData();
        //  dd($data);
        return view ("user",compact("data"));
    }
    public function tambah(){
        return view('tambahuser');
    }
    public function add (Request $request)
{
    // Validasi data yang diinputkan oleh user
    $this->validate($request, [
        'nama' => 'required|min:3|max:50',
        'kelas' => 'required',
        'jenis_kelamin' => ['required', 'in:Laki-Laki,Perempuan'],
        'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    ], [
        'nama.required' => 'Nama harus diisi',
        'nama.min' => 'Nama minimal 3 karakter',
        'nama.max' => 'Nama maksimal 50 karakter',
        'foto.image' => 'Foto harus berupa gambar',
        'foto.mimes' => 'Format gambar hanya JPG, PNG, GIF, SVG',
        'foto.max' => 'Ukuran foto terlalu besar (Maksimal 2MB)',
    ]);

    // Jika ada file foto yang diupload
    if ($request->file('foto')) {
        // Generate nama file unik
        $imgName = $request->nama . '_' . time() . '.' . $request->foto->extension();

        // Pindahkan file foto ke folder public/gambar
        $request->foto->move(public_path('gambar'), $imgName);
    } else {
        // Gunakan nama file default
        $imgName = 'default.png';
    }

    // Buat objek baru dari model User
    $user = new UserModel();

    // Siapkan data yang akan disimpan
    $data = [
        'nama' => $request->nama,
        'kelas' => $request->kelas,
        'jabatan' => $request->jabatan,
        'jenis_kelamin' => $request->jenis_kelamin,
        'foto' => $imgName,
    ];

    // Simpan data ke database
    $user->addData($data);

    // Tampilkan pesan sukses dan redirect ke halaman user
    return redirect('/user')->with('status', 'Tambah Data Berhasil!');
}
}