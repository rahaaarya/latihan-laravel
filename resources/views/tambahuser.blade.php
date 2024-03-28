@extends('index')

@section('MainContent')

<div class="card">
  <div class="card-header">
    <h1>Tambah Data</h1>
  </div>

  <div class="card-body">
    <form action="/kirimuser" method="post" enctype="multipart/form-data">
      @csrf

      <div class="form-group">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="kelas" class="form-label">Kelas</label>
        <input type="text" name="kelas" id="kelas" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="jabatan" class="form-label">Jabatan</label>
        <input type="text" name="jabatan" id="jabatan" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
          <option value="">Pilih...</option>
          <option value="Laki-Laki">Laki-Laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>

      <div class="form-group">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" name="foto" id="foto">
      </div>

      <div class="card-footer">
        <a href="/user" class="btn btn-danger">Batal</a>
        <button type="submit" class="btn btn-primary">Kirim</button>
      </div>
    </form>
  </div>
</div>

@endsection