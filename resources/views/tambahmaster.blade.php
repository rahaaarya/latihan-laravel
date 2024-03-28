@extends('index')

@section('MainContent')

<div class="card">
  <div class="card-header">
    <h1>Tambah Data</h1>
  </div>

  <div class="card-body">
    <form action="/kirimmaster" method="post" enctype="multipart/form-data">
      @csrf

      <div class="form-group">
        <label for="nama_barang" class="form-label">Nama Barang</label>
        <input type="text" name="nama_barang" id="nama_barang" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="harga_barang" class="form-label">Harga Barang</label>
        <input type="text" name="harga_barang" id="harga_barang" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="foto_barang" class="form-label">Foto Barang</label>
        <input type="file" name="foto_barang" id="foto_barang" class="form-control" required>
      </div>

      <div class="card-footer">
        <a href="/master" class="btn btn-danger">Batal</a>
        <button type="submit" class="btn btn-primary">Kirim</button>
      </div>
    </form>
  </div>
</div>

@endsection