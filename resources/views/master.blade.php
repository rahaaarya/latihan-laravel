@extends('index')

@section('MainContent')
<table class="table table-striped table-hover">
    <a href="/tambahmaster" class="btn btn-success">+ Tambah Data</a> <br><br>
    <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Barang</th>
          <th scope="col">Harga Barang</th>
          <th scope="col">Foto Barang</th>
          <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
         @php
          $counter = 1; // Inisialisasi nomor urut
        @endphp
        @foreach ($data as $item)
        <tr>
            <td>{{ $counter++ }}</td>
            <td>{{ $item->nama_barang }}</td>
            <td>{{ $item->harga_barang }}</td>
           <td><img src="{{ asset('gambar') }}/{{$item->foto_barang }}" alt="" width="200em"></td>
            <td>
                <a href="/edit/{{$item->id_barang}}" class="btn btn-warning">Edit</a>
                <form action="/delete/{{$item->id_barang}}" method="post" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
