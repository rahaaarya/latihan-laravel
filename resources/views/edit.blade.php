@extends('index')

@section('MainContent')
<div class="card">
  <div class="card-header">
    <h1>Edit Data Barang</h1>
  </div>

  <div class="card-body">
    <form action="/update/{{$data->id_barang}}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="nama_barang" class="form-label">Nama Barang</label>
        <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="{{$data->nama_barang}}" required>
      </div>

      <div class="form-group">
        <label for="harga_barang" class="form-label">Harga Barang</label>
        <input type="text" name="harga_barang" id="harga_barang" class="form-control" value="{{$data->harga_barang}}" required>
      </div>

      <div class="form-group">
        <label for="foto_barang" class="form-label">Foto Barang</label>
        <input type="file" class="form-control" name="foto_barang" id="foto_barang">
        <img src="{{ asset('gambar') }}/{{$data->foto_barang}}" alt="Foto Barang" width="200" class="mt-5">
      </div>

      <div class="card-footer">
        <a href="/master" class="btn btn-danger">Batal</a>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>
</div>
@endsection
